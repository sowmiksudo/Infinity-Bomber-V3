<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bombing extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'bombings';
    public $fillable = [
        "target",
        "amount",
        "sent",
        "threads",
        "user",
        "ip",
        "user_agent",
        "user_id"
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
