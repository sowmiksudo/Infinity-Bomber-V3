<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BombingController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Artisan;


Route::post('/', [BombingController::class, 'add']);
Route::get('/', [BombingController::class, 'publicPage']);

Route::get('/install', [InstallController::class, 'show']);
Route::post('/install', [InstallController::class, 'install']);

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminPanelController::class, 'login']);
    Route::post('login', [AdminPanelController::class, 'handleLogin']);
});



Route::group([
    "prefix" => "admin",
    "middleware" => ["AuthChecker"]
], function () {
    Route::get('/', [AdminPanelController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminPanelController::class, 'logout'])->name('admin.logout');
    Route::get('/bombings', [AdminPanelController::class, 'bombings'])->name('admin.bombings');
    Route::get('/history', [AdminPanelController::class, 'history'])->name('admin.history');


    Route::post('/changePass', [AdminPanelController::class, 'changePass'])->name('admin.changePass');
    Route::get('/changePass', [AdminPanelController::class, 'showChangePass'])->name('admin.showChangePass');
    
    
    Route::get('/add', [BombingController::class, 'show'])->name('admin.addBombing');
    Route::post('/add', [BombingController::class, 'add'])->name('admin.saveBombing');
    Route::get('/bombings/delete/{id}', [BombingController::class, 'delete'])->name('admin.delete');


    Route::get('/settings', [SettingsController::class, 'show'])->name('admin.settings');
    Route::post('/settings', [SettingsController::class, 'update']);


    Route::group(["prefix" => "blacklist"], function () {
        Route::get('/', [BlacklistController::class, 'blacklist'])->name('admin.blacklist');
        Route::get('/add', [BlacklistController::class, 'addBlacklist'])->name('admin.addBlacklist');
        Route::post('/add', [BlacklistController::class, 'add'])->name('admin.saveBlacklist');
        Route::get('/delete/{id}', [BlacklistController::class, 'deleteBlacklist']);
    });

    Route::group(['prefix' => 'manage_api'], function () {
        Route::get('/', [ApiController::class, 'showApi'])->name('api.index');
        Route::get('/edit/{id}', [ApiController::class, 'editApi'])->name('api.edit');
        Route::post('/edit/{id}', [ApiController::class, 'updateApi'])->name('api.save');
        Route::get('/delete/{id}', [ApiController::class, 'deleteApi'])->name('api.delete');
        Route::get('/add', [ApiController::class, 'addApi'])->name('api.add');
        Route::post('/add', [ApiController::class, 'insertApi'])->name('api.new');
        Route::get('/advanced', [ApiController::class, 'advancedEdit'])->name('api.adv');
        Route::post('/advanced', [ApiController::class, 'saveRawJson'])->name('api.saveJson');
    });
});


# Run artisan commands

Route::get('artisan/{command}/{flag?}', function ($command) {
    $artisan = Artisan::call($command);
    $output = Artisan::output();
    return $output;
});

/**
 * Ping route to keep process alive
 */


