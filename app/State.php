<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function clinics(){
        return $this->hasMany('App\Clinic');
        
    }
}
