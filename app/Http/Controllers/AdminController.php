<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Cafedras;
use App\Models\Teachers;

use App\Http\Requests\Teachers\Update as UpdateTeachersRequest;
use App\Http\Requests\News\Create as CreateNewRequest;
use App\Http\Requests\News\Delete as DeleteNewRequest;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('is.admin');
    }
    public function index(Request $request)
    {
    	$news = News::with('cafedra')->where('type',0)->get();
    	$articles = News::with('cafedra')->where('type',1)->get();
    	$actions = News::with('cafedra')->where('type',2)->get();

    	if($request->isMethod('post'))
    	{	

    		switch($request->type){
    			case 'news':
    				$data = $news;
    			break;
    			
    			case 'articles':
    				$data = $articles;
    			break;

    			case 'actions':
    				$data = $actions;
    			break;

    			default:
    				$data = 'false';
    			break;
    		}
    		return response()->json(['data' => $data]);
    	}else{
    		return view('adminlte::home',['news' => $news,'articles' => $articles, 'actions' => $actions]);
    	}
    }

    public function materials($type)
    {
        $materials = News::type($type)->withTrashed()->orderBy('updated_at','DESC')->paginate(15);

        return view('adminlte::materials',['news' => $materials,'type' => $type]);
    }

    public function teachers()
    {
        $teachers = Teachers::with('cafedra')->withTrashed()->orderBy('created_at','DESC')->paginate(10);
        $cafedras = Cafedras::all();

        return view('adminlte::teachers',['teachers' => $teachers,'cafedras' => $cafedras]);
    }

    public function creation($type)
    {
        switch($type){
            case 'new':

                $caf = Cafedras::all();
                return view('adminlte::create_new',['cafedras' => $caf]);
                
            break;
        }
    }


    public function upload(Request $request)
    {
            $name = explode('/',$request->file('img')->getClientOriginalName());

            $request->file('img')->move(public_path('img'), $name[count($name)-1]);

            return response($name[count($name)-1]);
    }

    public function create(CreateNewRequest $request)
    {
        if($request->isMethod('post')){
            if($request->post_type == 'new')
            {
                $item = News::create([
                    'title' => $request->title,
                    'caf_id' => $request->caf_id,
                    'type' => $request->type,
                    'img' => $request->img,
                    'text' => $request->text,
                    'priority' => $request->priority
                ]);
            }else{
                return response()->json(['success' => false]);
            }
            
            return response()->json(['success' => true,'data' => $item]);
        }
    }

    public function update(UpdateTeachersRequest $request)
    {
        if(class_exists('App\\Models\\'.$request->type)){
        
            $class = 'App\\Models\\'.$request->type;
        }else{
            return response()->json(['success' => false]);
        }

        $response = $class::where('id', $request->id)->update([
            $request->key => $request->value
        ]);

        return response()->json(['success' => $response]);
    }

    public function delete(DeleteNewRequest $request)
    {   
        if(class_exists('App\\Models\\'.$request->type)){
        
            $class = 'App\\Models\\'.$request->type;
        }else{
            return response()->json(['success' => false]);
        }

        $response = $class::where('id',$request->id)->delete();
        return response()->json(['success' => $response]);
    }

    public function restore(DeleteNewRequest $request)
    {
        if(class_exists('App\\Models\\'.$request->type)){
        
            $class = 'App\\Models\\'.$request->type;
        }else{
            return response()->json(['success' => false]);
        }


        $response = $class::where('id', $request->id)->restore();

        return response()->json(['success' => $response]);
    }

}
