<?php

use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/statistics', [StatisticsController::class, 'generalStatistics'])->name('statisticsPage');
Route::get('/statistics/station/{id}', [StatisticsController::class, 'stationStatistics'])->name('stationStatisticsPage');
Route::get('/statistics/mac_address/{id}', [StatisticsController::class, 'macAddressStatistics'])->name('macAddressStatisticsPage');

Route::get('/stationData/{data}', [MainController::class, 'stationData']);
