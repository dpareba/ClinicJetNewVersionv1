<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinictype extends Model
{
    public function clinics(){
        return $this->hasMany('App\Clinic');
    }
}
