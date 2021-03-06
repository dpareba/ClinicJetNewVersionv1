<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;
use App\Mail\AccountVerified;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','pan','aadhar','jobtype_id','r_id','isActivated','isactivatedtoken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public static function boot()
     {
        parent::boot();
        static::creating(function ($user){
            $user->token = str_random(40);
            $user->isactivatedtoken = str_random(40);
            $user->isActivated = false;
        });
    }

    public function hasVerified()
    {
        $this->verified = true;
        $this->token = null;

        $this->save();

        //Mail::to($this->email)->send(new UserAccountVerified($this));
        Mail::to($this->email)->send(new AccountVerified($this));
    }
    public function doctorinfos()
    {
        return $this->hasMany('App\Doctorinfo');
    }
    public function patients()
    {
        return $this->belongsToMany('App\Patient','patient_user','user_id','patient_id');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role','clinic_role_user','user_id','role_id');
    }
    public function clinics()
    {
        return $this->belongsToMany('App\Clinic','clinic_role_user','user_id','clinic_id');
    }

    public function jobtype()
    {
        return $this->belongsTo('App\Jobtype');
    }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }    
    public function visits()
    {
        return $this->hasMany('App\Visit');
    }

    public function medicines()
    {
        return $this->hasMany('App\Medicine');
    }

    public function pathologies()
    {
        return $this->hasMany('App\Pathology');
    }

    public function templates()
    {
        return $this->hasMany('App\Template');
    }

    public function slots()
    {
        return $this->hasMany('App\Slot');
    }



}
