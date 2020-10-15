<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Clients
Route::prefix('v1')->group(function () {
    Route::get('clients', 'ClientController@afficheLesClients');
    Route::post('clients', 'ClientController@ajouteUnClient');
    Route::get('clients/{id}', 'ClientController@afficheUnClient');
    Route::put('clients/{id}', 'ClientController@miseAJourUnClient');
    Route::delete('clients/{id}', 'ClientController@supprimerUnClient');
});

// Vehicules
Route::prefix('v1')->group(function () {
    Route::get('vehicules', 'ClientController@afficheLesVehicules');
    Route::post('vehicules', 'ClientController@ajouteUnVehicule');
    Route::get('vehicules/{id}', 'ClientController@afficheUnVehicule');
    Route::put('vehicules/{id}', 'ClientController@miseAJourUnVehicule');
    Route::delete('vehicules/{id}', 'ClientController@supprimerUnVehicule');
});