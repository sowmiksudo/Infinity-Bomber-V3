<?php

namespace App\Providers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        try {
            $settings = DB::select("SELECT * FROM settings");
        } catch (\Illuminate\Database\QueryException $e){
            //
        }

        View::share('author', 'Shayer Mahmud Sowmik');
        View::share("ga_id", $settings[0]->ga_id ?? '');
        View::share('project_name', $settings[0]->app_name ?? 'PrimeBomber');
        View::share('admin_contact', $settings[0]->admin_contact ?? 'https://facebook.com/ffsowmik');;
        View::share('developer_contact', 'https://facebook.com/ffsowmik');
    }
}
