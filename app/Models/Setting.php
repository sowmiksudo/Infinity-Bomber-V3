<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    public $fillable = [
        "admin_contact",
        "app_name",
        "max_bombing",
        "notice",
        "ga_id",
        "facebook_link",
        "youtube_link",
        "max_load",
        "max_load_message",
        "footer",
        "protect_notice",
        "share_text",
        "public_bombing_page",
        "use_multi_threads",
    ];

}
