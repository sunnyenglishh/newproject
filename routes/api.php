<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Auth::routes();
Route::post('/login', 'Auth\LoginController@apiLogin');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    
    Route::resources([
        'companies' => 'CompaniesController',
        'employees' => 'EmployeesController',
    ]);
});


// Route::resources([
//     'companies' => 'CompaniesController',
//     'employees' => 'EmployeesController',
// ]);