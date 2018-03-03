<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafedras extends Model
{
    protected $table = 'cafedras';

    public function header()
    {
    	return $this->hasOne(Teachers::class,'header_id','id');
    }

    public function teachers()
    {
    	return $this->hasMany(Teachers::class,'caf_id','id');
    }
}
