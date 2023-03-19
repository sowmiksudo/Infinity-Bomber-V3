<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('destroy', function(){
    Artisan::call('destroy');
});


