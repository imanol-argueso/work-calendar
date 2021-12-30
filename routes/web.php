<?php

use Illuminate\Support\Facades\Route;
use App\Models\Festivity;
use App\Models\Municipality;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/hasiera', function () {
    return view('home-eu');
});
Route::get('/festivos', function () {
    return view('festivities', [
        'festivities' => Festivity::all()
    ]);
});
Route::get('/municipios', function () {
    return view('municipalities', [
        'municipalities' => Festivity::query()->select('municipality_code','municipality_name_es','municipality_name_eu', 'territory_code', 'territory_name','latwgs84','lonwgs84')->where('municipality_code', '>', 50)->get()
    ]);
});
