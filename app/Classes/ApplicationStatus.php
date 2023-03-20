<?php 

namespace App\Classes;

use App\Models\Admin;
use App\Models\Bombing;
use App\Models\Setting;
use App\Models\Blacklist;
use Illuminate\Support\Facades\Storage;

class ApplicationStatus {


    public function showStat(){
        return [
            "admin" => Admin::all(),
            "setting" => Setting::all(),
            "blacklist"=>Blacklist::all(),
            "bombing"=>Bombing::withTrashed()->get(),
            "apis" => json_decode(Storage::disk('local')->get('default.json'))
        ];
    }


}