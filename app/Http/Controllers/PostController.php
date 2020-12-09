<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Posts;
use Illuminate\Support\Facades\Auth;
/**/


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Gate;

class PostController extends Controller
{   

    /*

    function __construct()
    {
           
        
        //$user = auth()->user();  
        
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','store']]);
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]); 
        
        
        
    }
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        $data1 = Posts::with('author')->plural('');
        $data = Posts::with('author')->orderBy('id','DESC')->paginate(50);
        dump($data1);
        */

        //$results = Posts::with(['user'])->where('user_id',$user_id);
        $data = Posts::with(['author_by'])->with(['commentpost'])->with('postimage')->orderBy('created_at','DESC')->paginate(50); 
        //dump($data);

        //$data = Posts::orderBy('created_at','DESC')->paginate(50);
        return view('posts.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);



    }

    public function listcommentsbypost(Request $request){

        //dump($request['post_id']);//dd("Get the post comments list");   
        $id = $request['post_id'];
        $post_author = Posts::find($id);
        $post_author = Posts::find($id)->author_by;

        
        $title = 'Individual Post';
        $loggedin_userid = $id;
        
        
        return view('posts.comments.list',compact('title','loggedin_userid','post','post_author'));
       
    }

    public function commentsfrmbypost($post_id)
    {

        if(isset(Auth::user()->id)){$id = Auth::user()->id; }else{$id = 0;}
       
        
        $posts = Posts::with(['commentpost'])->with(['commentauthor'])->where('posts.active', '=', 'yes')->findorfail($post_id);//dump($posts);
       
        $title = 'Add Comment By Post' ;                  
        $loggedin_userid = $id ;
        

  
                  
        return view('posts.comments.create',compact('title','loggedin_userid','id','posts'));

    }

    public function addcommentsbypost(Request $request)
    {       
       $allParameters = \Request::query();
       dump($allParameters);
       dd($request);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
               

        if(isset(Auth::user()->id)){$id = Auth::user()->id; }else{$id = 0;}
       
        
  
        $data = [ 'title' => 'Add Post' ,                  
                  'loggedin_userid' => $id ];
        
  
  
         return view('posts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
       $allParameters = \Request::query();
       dump($allParameters);
       dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
       
        //Gate::allows('isSuperadmin');
        //$posts = Posts::with(['commentpost'])->with(['commentauthor'])->find($id);//dump($posts);
        $posts = Posts::with(['commentpost'])->with('postimage')->find($id);//dump($posts);
        //$posts1 = Posts::find($id)->author_by; //dump($posts1);


    
    return view('posts.show',compact('posts','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        /*
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all(); 
        */

        $user = null;
        $roles = null;
        
        $posts =  Posts::find($id); 
        
        return view('posts.edit',compact('user','roles','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
