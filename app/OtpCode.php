<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class OtpCode extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function user()
    {
        return $this->belongTo('App\User');
    }
}