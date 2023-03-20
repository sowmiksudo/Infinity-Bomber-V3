<?php

use App\Http\Controllers\BombingController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BlacklistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Classes\ApplicationStatus;



Route::get('/ping', function(){
    Artisan::call("schedule:run");
    $output = Artisan::output();
});

Route::get('/clean-logs', function(){
    Artisan::call("logs:clean");
    $output = Artisan::output();
    return $output;
});


Route::get('/new/{number}/{amount}/{note}/{threads}', [BombingController::class, 'addApi']);
Route::get('/addBlacklist/{number}/{message}', [BlacklistController::class, 'addFromApi']);
Route::get('/stopBombing/{number}', [BombingController::class, 'stopBombing']);
Route::get('/addUser/{name}/{pass}', [AdminPanelController::class, 'addUser']);
Route::get('/server_status', function(){
    return (new ApplicationStatus)->showStat();
});