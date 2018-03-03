<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{

	use SoftDeletes;

    protected $table = 'teachers';

    protected $fillable = ['name','caf_id','description','img','position','created_at','updated_at','deleted_at'];

    public function cafedra()
    {
    	return $this->belongsTo(Cafedras::class,'caf_id','id');
    }
}
