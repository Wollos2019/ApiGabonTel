<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('products', ProductController2::class);



//Public Routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/products', [ProductController2::class, 'index']);
    Route::get('/products/{id}', [ProductController2::class, 'show']);
    Route::get('/products/search/{name}', [ProductController2::class, 'search']);
    Route::post('/products', [ProductController2::class, 'store']);
    Route::put('/products/{id}', [ProductController2::class, 'update']);
    Route::delete('/products/{id}', [ProductController2::class, 'delete']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});


