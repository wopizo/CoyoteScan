<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/st', [MainController::class, 'toStation'])->name('toStation');
Route::get('/mac', [MainController::class, 'toMac'])->name('toMac');

Route::get('/statistics', [StatisticsController::class, 'generalStatistics'])->name('statisticsPage');
Route::get('/statistics/station/{id}', [StatisticsController::class, 'stationStatistics'])->name('stationStatisticsPage');
Route::get('/statistics/mac_address/{id}', [StatisticsController::class, 'macAddressStatistics'])->name('macAddressStatisticsPage');

Route::get('/stationData/{data}', [MainController::class, 'stationData']);

Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/user/edit/macs/{id}', [UserController::class, 'editMac'])->name('removeUserMac');
Route::post('/user/add/macs', [UserController::class, 'addMac'])->name('addUserMac');
Route::post('/user/edit/marked', [UserController::class, 'editMarked'])->name('editMarked');
Route::post('/user/edit/names', [UserController::class, 'editNames'])->name('editNames');




Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/station', [AdminController::class, 'stationPage'])->name('stationAdminPage');
    Route::get('/admin/station/search', [AdminController::class, 'stationSearch'])->name('stationAdminPageSearch');
    Route::post('/admin/station/changeStatus/{id}', [AdminController::class, 'stationChange'])->name('stationAdminChange');
    Route::post('/admin/station/stationAdd', [AdminController::class, 'stationAdd'])->name('stationAdminAdd');

    Route::get('/admin/user', [AdminController::class, 'userPage'])->name('userAdminPage');
    Route::get('/admin/user/search', [AdminController::class, 'userSearch'])->name('userAdminPageSearch');
    Route::post('/admin/user/changeMarked/{id}', [AdminController::class, 'userChange'])->name('userAdminChange');

    Route::get('/admin/mac', [AdminController::class, 'macPage'])->name('macAdminPage');
    Route::get('/admin/mac/search', [AdminController::class, 'macSearch'])->name('macAdminPageSearch');
    Route::post('/admin/mac/changeMarked/{id}', [AdminController::class, 'macChange'])->name('macAdminChange');

    Route::get('/admin/app', [AdminController::class, 'appPage'])->name('appAdminPage');
});

Auth::routes();

Route::get('/home', [MainController::class, 'main'])->name('home');
