<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function city(){
        return $this->belongsTo(City::class);
    }
    
    public function assistance() {
        return $this->hasMany(Assistance::class, 'impact_id');
    }
}
