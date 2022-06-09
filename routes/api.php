<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkCalendarApi;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('v1/festivities/bydate/{year}', [WorkCalendarApi::class, 'getFestivitiesByYear']);
Route::get('v1/festivities/bydate/{year}/{month}', [WorkCalendarApi::class, 'getFestivitiesByMonth']);
Route::get('v1/festivities/bydate/{year}/{month}/{day}', [WorkCalendarApi::class, 'getFestivitiesByDay']);
Route::get('v1/festivities/bylocation/bydate/{year}', [WorkCalendarApi::class, 'getBasqueFestivities']);
Route::get('v1/festivities/bylocation/{territory}/bydate/{year}', [WorkCalendarApi::class, 'getFestivitiesByTerritory']);
Route::get('v1/festivities/bylocation/{territory}/{municipality}/bydate/{year}', [WorkCalendarApi::class, 'getFestivitiesByMunicipality']);
Route::get('v1/municipalities', [WorkCalendarApi::class, 'getMunicipalities']);
Route::get('v1/territories', [WorkCalendarApi::class, 'getTerritories']);
