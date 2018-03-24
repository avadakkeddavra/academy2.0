<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cafedras;
use App\Models\News;
use App\Models\Teachers;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
    	$cafedras = Cafedras::where('id','!=',7)->get();

    	$data['students'] = News::students()->orderBy('updated_at','desc')->take(3)->get();
    	$lastNew = News::favouriteOrLast();

    	$data['events'] = News::where('type',2)->where('priority','>',1)->orderBy('updated_at','desc')->take(3)->get();
        $data['news'] = News::where('type',0)->where('priority','>',1)->orderBy('updated_at','desc')->take(3)->get();

        $teachers = Teachers::where('caf_id',7)->get();

    	return view('home',['cafedras' => $cafedras,'data' => $data,'lastnew' => $lastNew,'teachers' => $teachers]);
    }
}
