<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Cafedras;

class NewsController extends Controller
{
    public function index(Request $request)
    {
    	$news = News::orderBy('updated_at','desc')->take(10)->get();
        $cafedras = Cafedras::all();
        if($request->isMethod('post'))
        {

        }
    	return view('news',['news' => $news,'cafedras' => $cafedras, 'ajax' => false]);
    }

    public function adminIndex()
    {
    	$news = News::where('caf_id','!=',null)->where('type',0)->orderBy('updated_at','DESC')->get();

    	return view('adminlte::news',['news' => $news]);
    }

    public function search(Request $request)
    {
        $news = News::where('caf_id','!=',null);

        if($request->type != null)
        {
            $news = $news->where('type',$request->type);
        }

        if($request->date != '')
        {
            $news = $news->where('updated_at','<=',$request->date);
        }

        if($request->caf_id != null)
        {
            $news = $news->where('caf_id',$request->caf_id);
        }

        if(isset($request->skip))
        {
            $news = $news->orderBy('updated_at','desc')->skip($request->skip);
        }else{
            $news = $news->orderBy('updated_at','desc');
        }

        return view('layouts.partials.news_template',['news' => $news->take(10)->get(),'ajax' => true ]);
    }

    public function single(News $new)
    {
        return view('single',['new' => $new]);
    }

}
