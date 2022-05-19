<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Role extends Model
{
    use UsesUuid;

    protected $guarded = [];

    // public function users()
    // {
    //     return $this->hasMany('App\User');
    // }
}