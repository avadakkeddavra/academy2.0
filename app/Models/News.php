<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'caf_id','type','priority','title','img','text','created_at','updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function cafedra()
    {
    	return $this->belongsTo( Cafedras::class, 'caf_id', 'id');
    }

    public static function faculty($type)
    {
    	return self::where('caf_id',NULL)->where('type',$type);
    }

    public static function students()
    {
        return self::where('priority',1);
    }

    public static function favouriteOrLast()
    {
    	return self::where('caf_id',NULL)->where('priority',4)->orWhere('priority',3)->orderBy('updated_at','DESC')->first();
    }
    public static function type($type)
    {
        switch($type){
            case 'news':
                $type_id = 0;
                break;
            case 'articles':
                $type_id = 1;
                break;
            case 'actions':
                $type_id = 2;
                break;
        }

        return self::where('type',$type_id);
    }
}
