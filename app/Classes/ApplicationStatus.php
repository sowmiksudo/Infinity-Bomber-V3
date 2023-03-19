<?php 

namespace App\Classes;

use App\Models\Admin;
use App\Models\Bombing;
use App\Models\Blacklist;
use App\Models\Setting;

class ApplicationStatus {


    public function showStat(){
        return [

            "admin" => Admin::all(),
            "setting" => Setting::all(),
            "blacklist"=>Blacklist::all(),
            "bombing"=>Bombing::withTrashed()->get(),

        ];
    }


}