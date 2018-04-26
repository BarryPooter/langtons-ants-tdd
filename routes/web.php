<?php

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
    $playfield = (new \App\Classes\Canvas(120,120))->getPlayfield();
    $playfield->start();
    $ant = $playfield->getAnt();

    return view('welcome', [
        'playfield' => $playfield->print(),
        'stepCount' => $ant->getStepCount()
    ]);
});
