<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cafedras extends Model
{
    use SoftDeletes;
    protected $table = 'cafedras';

    protected $fillable = [
        'name','img','description','header_id'
    ];

    public function header()
    {
    	return $this->belongsTo(Teachers::class,'header_id','id');
    }

    public function teachers()
    {
    	return $this->hasMany(Teachers::class,'caf_id','id');
    }
}
