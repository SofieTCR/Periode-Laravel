<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

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
    return view('welcome');
});

Route::get('/hello', function () {

    $MyText= 'Hello World!';
    
    return ($MyText);
    
});

Route::get('/hello/{name}', function ($name) {

    $MyText= 'Hello ' . $name;
    
    return ($MyText);
    
});

Route::get('/mooiekop', function () {

    $MyText = 'Dit is een mooie kop';

    return view('MyFantasticView')->with('kop', $MyText);
});

Route::get('/CRUD/Add{PK}', function($PK) {
    return "Temp" . $PK;
});

Route::get('/CRUD/Edit{PK}', function($PK) {
    return "Temp" . $PK;
});

Route::get('/CRUD/Remove{PK}', function($PK) {
    return "Temp" . $PK;
});

Route::resources([
    'agenda' => AgendaController::class,
]);

Route::get('testedit/{id}', function($id) {
    $oAgenda = \App\Models\Agenda::find($id);

    $oAgenda->naam = "I've changed, For the worse";
    $oAgenda->save();
});

Route::get('testdelete/{id}', function($id) {
    \App\Models\Agenda::destroy($id);
});