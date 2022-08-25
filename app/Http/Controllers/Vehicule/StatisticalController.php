<?php

namespace App\Http\Controllers\Vehicule;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\MaintenanceVehicule;
use App\Models\Panne;
use App\Models\Vehicule\Vehicule;
use App\Models\Vendor;
use Illuminate\Http\Request;

class StatisticalController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data=[
           // 'countDepartment'=>Department::all()->count(),
            //'countClient'=>Client::count(),
            //'countEmployee'=>Employee::count(),
           // 'countWorkingDay'=>workingDay::where('status','=',1)->count(),
            'totalVehicules'=>Vehicule::count(),
            'totalFourniseur'=>Vendor::count(),
            'totalPanne'=>Panne::count(),
            'totalMaintenance'=>MaintenanceVehicule::count(),
        ];

        return $this->successResponse($data);
    }
}
