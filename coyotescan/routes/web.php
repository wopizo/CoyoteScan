<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/statistics', [MainController::class, 'generalStatistics'])->name('statisticsPage');
Route::get('/statistics/station/{id}', [MainController::class, 'stationStatistics'])->name('stationStatisticsPage');
Route::get('/statistics/mac_address/{id}', [MainController::class, 'macAddressStatistics'])->name('macAddressStatisticsPage');

Route::get('/stationData/{data}', [MainController::class, 'stationData']);
