<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flood extends Model
{
    protected $guarded = ['id'];

    public function cause(){
        return $this->belongsTo(Cause::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

