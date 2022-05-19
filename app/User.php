<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\UsesUuid;
use Carbon\Carbon;
use App\OtpCode;
use App\Role;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,UsesUuid ;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'photo_profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        if($this->role_id === $this->get_role_admin()){
            return true;
        }
        return false;
    }

    public function get_role_admin()
    {
        $role = Role::where('name', 'admin')->first();
        return $role->id;
    }

    public function get_role_user()
    {
        $role = Role::where('name', 'user')->first();
        return $role->id;
    }

    public static function boot()
    {
        parent::boot();

        static::creating( function($model){
            $model->role_id = $model->get_user_role_id();
        });

        static::created(function($model){
            $model->generate_otp_code();
         });
    }

    protected function get_user_role_id()
    {
        $role = Role::where('name', 'user')->first();
        return $role->id;
    }
    
    public function generate_otp_code()
    {
        do{
            $random = mt_rand(100000, 999999);
            $check = OtpCode::where('otp', $random)->first();
        }
        while ($check);
        
        $now = Carbon::now();
        
        //create otp code 
        $otp_code = OtpCode::updateOrCreate(
            ['user_id' => $this->id ],
            ['otp' => $random, 'valid_until' => $now->addMinutes(5)]
        );
    }
    
    public function otp_code()
    {
        return $this->hasOne('App\OtpCode', 'user_id', 'id');
    }

}