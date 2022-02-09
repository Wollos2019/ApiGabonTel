<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

trait ApiResponser
{
    private $reservedKeyWords = [
        'sort_by',
        'page',
        'per_page',
        'sort_by_desc',
        'only',
        'except',
        'debug'
    ];

    protected function successResponse($data,$code = 200)
    {
        return response()->json($data,$code);
    }

    protected function errorResponse($message,$code=404)
    {
        return response()->json(['error'=>$message,'code'=>$code],$code);
    }
    protected function showAll(Collection $collection,$paginate = true, $code = 200, $filter = true, $sort = true,  $cache = false, $truncate = true)
    {

        if($collection->isEmpty()){
            return $this->successResponse(['data'=>[]],$code);
        }

        if($filter) {
            $collection = $this->filterData($collection);
        }



        if($sort) {
            $collection = $this->sortData($collection);
            $collection = $this->sortDataDesc($collection);
        }

        if ($truncate) {
            $collection = $this->truncateData($collection);
        }

        if($paginate) {
            $collection = $this->paginateDataCollection($collection);
        }

        if($cache) {
            $collection = $this->cacheResponse($collection);
        }

        return $this->successResponse($collection,$code);
    }

    protected function showOne(Model $instance,$code = 200)
    {
        $instance = $this->truncateData($instance);

        return $this->successResponse($instance,$code);
    }

    protected function showMessage($message,$code = 200)
    {
        return $this->successResponse(['data'=>$message],$code);
    }

    public function explodeString($str)
    {
        $ret = array(); $in_parenths = 0; $pos = 0;
        for($i=0;$i<strlen($str);$i++)
        {
            $c = $str[$i];

            if($c == ',' && !$in_parenths) {
                $ret[] = substr($str, $pos, $i-$pos);
                $pos = $i+1;
            }
            elseif($c == '(') $in_parenths++;
            elseif($c == ')') $in_parenths--;
        }
        if($pos > 0) $ret[] = substr($str, $pos);

        return $ret;
    }


    public function truncateHelper($item, $query, $truncateData)
    {
        $newTruncateData = $truncateData;

        if (is_array($truncateData)) {
            foreach ($truncateData as $key => $datum) {
                if (strpos($datum,  ':(') && $query !== 'except') {
                    $newTruncateData[$key] = substr($datum, 0, strpos($datum, ":"));
                } elseif (!strpos($datum,  ':(')) {
                    $newTruncateData[$key] = $datum;
                }
            }
        }

        $data = collect($item)->{$query}($newTruncateData)->toArray();

        if (is_array($truncateData)) {
            foreach ($truncateData as $datum) {
                if (strpos($datum,  ':(')) {
                    preg_match("/\((((?>[^()]+)|(?R))*)\)/", $datum, $match);
                    $truncateDatum = $this->explodeString($match[1]);
                    if (!empty($truncateDatum)) {
                        $key = substr($datum, 0, strpos($datum, ":"));
                        if (is_array($data[$key]) && array_keys($data[$key]) === range(0, count($data[$key]) - 1)) {
                            $data[$key] = collect($data[$key])->map(function ($subItem) use ($query, $truncateDatum) {
                                return $this->truncateHelper($subItem, $query, $truncateDatum);
                            });
                        } elseif (is_array($data[$key])) {
                            $data[$key] = $this->truncateHelper($data[$key], $query, $truncateDatum);
                        }
                    }
                }
            }
        }

        return $data;
    }

    public function truncateData($instance)
    {
        foreach (request()->query() as $query => $value) {
            if ($query === 'only' || $query === 'except') {

                if (count($truncateData = $this->explodeString($value)) === 0) {
                    $truncateData = [$value];
                }

                if ($instance instanceof Collection) {
                    $instance = $instance->map(function ($item) use ($query, $value, $truncateData) {
                        return $this->truncateHelper(!is_array($item) ? $item->toArray() : $item, $query, $truncateData);
                    });
                } else {
                    $instance = $this->truncateHelper($instance, $query, $truncateData);
                }
            }
        }

        return $instance;
    }


    public function filterData(Collection $collection)
    {
        foreach (request()->query() as $query => $value){
            if(isset($query, $value) && !in_array($query, $this->reservedKeyWords)){
                $collection = $collection->where($query,strtolower($value));
            }
        }

        return $collection;

    }

    protected function sortData(Collection $collection)
    {
        if(request()->has('sort_by')){
            $attribute = request()->sort_by;
            $collection = $collection->sortBy->{$attribute};
        }
        return $collection;
    }


    protected function sortDataDesc(Collection $collection)
    {
        if(request()->has('sort_by_desc')){
            $attribute = request()->sort_by_desc;
            $collection = $collection->sortByDesc->{$attribute};
        }
        return $collection;
    }


    protected function paginateDataCollection(Collection $collection)
    {
        if(request()->has('per_page') && request()->per_page == '*'){
            return $collection;
        }

        $rules = [
            'per_page'=>'integer|min:1|max:500',
        ];

        $validator = Validator::make(request()->all(),$rules);

        $validator->validate();

        $page = LengthAwarePaginator::resolveCurrentPage();

        $perPage = 15;

        if(request()->has('per_page')){
            $perPage = (int) request()->per_page;
        }

        $results = $collection->slice(($page-1) * $perPage,$perPage)->values();

        $paginated = new LengthAwarePaginator($results,$collection->count(),$perPage,$page,[
            'path'=>LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginated->appends(request()->all());

        return $paginated;
    }
    protected function paginateResultSearch(Collection $collection)
    {
        if(request()->has('per_page') && request()->per_page != '*'){
            $rules = [
                'per_page'=>'integer|min:1|max:50',
            ];

            $validator = Validator::make(request()->all(),$rules);

            $validator->validate();
        }

        $page = LengthAwarePaginator::resolveCurrentPage();

        $perPage = 15;

        if(request()->has('per_page')){
            $perPage = (int) request()->per_page;
        }

        if (request()->has('per_page') && request()->per_page == '*') {
            $perPage = $collection->count();
            $page = 1;
        }

        $results = $collection->slice(($page-1) * $perPage,$perPage)->values();

        $paginated = new LengthAwarePaginator($results,$collection->count(),$perPage,$page,[
            'path'=>LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginated->appends(request()->all());

        return $paginated;
    }

    protected function cacheResponse($data)
    {
        $url = request()->url();

        $queryParams = request()->query();

        ksort($queryParams);

        $queryString = $queryParams = http_build_query($queryParams);

        $fullUrl = "{$url}?{$queryString}";

        return Cache::remember($fullUrl,300,function () use ($data){

            return $data;
        });
    }



}
