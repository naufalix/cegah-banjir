<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flood extends Model
{
    protected $guarded = ['id'];

    public function cause(){
        return $this->belongsTo(Cause::class);
    }
}

