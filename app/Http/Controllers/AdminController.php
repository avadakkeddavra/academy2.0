<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    	$news = News::where('type',0)->count();
    	$articles = News::where('type',1)->count();
    	$actions = News::where('type',2)->count();
    	$teachers = Teachers::count();
    	$cafedras = Cafedras::count();
        $users = User::count();

    	return view('adminlte::home',[
                'news' => $news,
                'articles' => $articles,
                'actions' => $actions,
                'teachers' => $teachers,
                'cafedras' => $cafedras,
                'users' => $users
        ]);

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

    public function cafedras()
    {
        $cafedras = Cafedras::withTrashed()->get();

        return view('adminlte::show.cafedras',['cafedras' => $cafedras]);
    }

    public function creation($type)
    {
        switch($type){
            case 'new':

                $caf = Cafedras::all();
                return view('adminlte::create.new',['cafedras' => $caf,'type' => 'create']);
                
            break;
            case 'cafedra':

                $teachers = Teachers::all();
                return view('adminlte::create.cafedra',['teachers' => $teachers,'type' => 'create']);

            break;
            case 'teacher':
                $caf = Cafedras::all();
                return view('adminlte::create.teacher',['cafedras' => $caf,'type' => 'create']);
            break;
        }
    }

    public function updating($type,$id)
    {
        switch($type){
            case 'new':

                $caf = Cafedras::all();
                $item = News::where('id',$id)->first();

                return view('adminlte::create.new',['cafedras' => $caf,'new' => $item,'type' => 'update']);

                break;
            case 'cafedra':
                $teachers = Teachers::all();

                $item = Cafedras::withTrashed()->where('id',$id)->first();

                return view('adminlte::create.cafedra',['teachers' => $teachers,'cafedra' => $item,'type' => 'update']);
            break;

            case 'teacher':

                $caf = Cafedras::all();
                $item = Teachers::withTrashed()->where('id',$id)->first();

                return view('adminlte::create.teacher',['cafedras' => $caf,'teacher' => $item,'type' => 'update']);
            break;
        }
    }


    public function upload(Request $request)
    {
            $name = explode('/',$request->file('img')->getClientOriginalName());

            $request->file('img')->move(public_path('img'), $name[count($name)-1]);

            return response($name[count($name)-1]);
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){

            switch($request->post_type) {
                case 'new':
                    $item = News::create([
                        'title' => $request->title,
                        'caf_id' => $request->caf_id,
                        'type' => $request->type,
                        'img' => $request->img,
                        'text' => $request->text,
                        'priority' => $request->priority
                    ]);
                break;

                case 'cafedra':

                    $item = Cafedras::create([
                        'name' => $request->title,
                        'img' => $request->img,
                        'description' => $request->text,
                        'header_id' => $request->teacher_id
                    ]);

                break;

                case 'teacher':
                    $item = Teachers::create([
                        'name' => $request->title,
                        'img' => $request->img,
                        'description' => $request->text,
                        'caf_id' => $request->caf_id,
                        'position' => $request->position
                    ]);
                break;

                default:
                    return response()->json(['success' => false]);
                break;
            }
            return response()->json(['success' => true,'data' => $item]);

        }
    }

    public function updateFullItem($type,$id,Request $request)
    {
        switch ($type) {
            case 'cafedra':

            $response = Cafedras::where('id',$id)->update([
                'name' => $request->title,
                'img' => $request->img,
                'description' => $request->text,
                'header_id' => $request->teacher_id
            ]);

             break;
            case 'new':
                $response = News::where('id',$id)->update([
                    'title' => $request->title,
                    'caf_id' => $request->caf_id,
                    'type' => $request->type,
                    'img' => $request->img,
                    'text' => $request->text,
                    'priority' => $request->priority
                ]);
            break;
            case 'teacher':
                $response = Teachers::where('id',$id)->update([
                    'name' => $request->title,
                    'img' => $request->img,
                    'description' => $request->text,
                    'caf_id' => $request->caf_id,
                    'position' => $request->position
                ]);
            break;
        }
        return response()->json(['success' => $response]);
    }

    public function update(Request $request)
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
