<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsulanController; 
use App\Http\Controllers\UnitController; 
use App\Http\Controllers\PusatkendaliController; 
use App\Http\Controllers\GroupController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'keycloak-web'],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'usulan'],function(){
        Route::get('/{id}', [UsulanController::class, 'index']);
        Route::get('/{id}/get_data', [UsulanController::class, 'get_data']);
        Route::get('/{id}/modal', [UsulanController::class, 'modal']);
        Route::post('/{id}/save', [UsulanController::class, 'save']);
    });
    Route::group(['prefix' => 'unit'],function(){
        Route::get('', [UnitController::class, 'index']);
        Route::get('/get_data', [UnitController::class, 'get_data']);
        Route::get('/get_nik', [UnitController::class, 'get_nik']);
        Route::get('/modal', [UnitController::class, 'modal']);
        Route::post('/save', [UnitController::class, 'save']);
    });
    Route::group(['prefix' => 'master/pusatkendali'],function(){
        Route::get('', [PusatkendaliController::class, 'index']);
        Route::get('/get_data', [PusatkendaliController::class, 'get_data']);
        Route::get('/get_nik', [PusatkendaliController::class, 'get_nik']);
        Route::get('/modal', [PusatkendaliController::class, 'modal']);
        Route::get('/delete', [PusatkendaliController::class, 'delete_data']);
        Route::post('/', [PusatkendaliController::class, 'save']);
    });
    Route::group(['prefix' => 'master/group'],function(){
        Route::get('', [GroupController::class, 'index']);
        Route::get('/get_data', [GroupController::class, 'get_data']);
        Route::get('/get_nik', [GroupController::class, 'get_nik']);
        Route::get('/modal', [GroupController::class, 'modal']);
        Route::get('/delete', [GroupController::class, 'delete_data']);
        Route::post('/', [GroupController::class, 'save']);
    });
});
// Route::group(['prefix' => 'test','middleware' => 'keycloak-web'],function(){
//     return view('welcome');
// });


// Auth::routes();


