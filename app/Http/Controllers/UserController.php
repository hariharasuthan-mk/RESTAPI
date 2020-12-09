<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

/**/
use App\Http\Requests\User\FieldRequest;
use App\Http\Requests\User\updateFieldRequest;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Gate;





class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    function __construct()
    {
       
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        
    }
    

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        
         /*
         $user = User::find($id='6');
       
        $user->assignRole('Other');
        $user->save();
        dd($user);
        $permission = Permission::get();    
        Permission::create(['name' => 'post-view']);


        $role1 = Role::findByName('Admin');
        $role1->givePermissionTo('post-view'); 


        $role2= Role::findByName('Other'); 
         
        $role2->givePermissionTo('search-list');
        $role2->givePermissionTo('comments-list');
        $role2->givePermissionTo('comments-create');
        
        $role2->givePermissionTo('post-view'); 

        dd($role2); 

        $role1 = Role::findByName('Admin');
         
         
            $role1->givePermissionTo('search-list');

            $role1->givePermissionTo('comments-list');
            $role1->givePermissionTo('comments-edit');
            $role1->givePermissionTo('comments-create');
            $role1->givePermissionTo('comments-delete');


            $role1->givePermissionTo('role-list');
            $role1->givePermissionTo('role-edit');
            $role1->givePermissionTo('role-create');
            $role1->givePermissionTo('role-delete');  

            $role1->givePermissionTo('comments-list');
            $role1->givePermissionTo('comments-edit');
            $role1->givePermissionTo('comments-create');
            $role1->givePermissionTo('comments-delete');  


            $role1->givePermissionTo('user-list');
            $role1->givePermissionTo('user-edit');
            $role1->givePermissionTo('user-create');
            $role1->givePermissionTo('user-delete');  

         
        dd($role2);   
        

        $permission = Permission::get();        


        Permission::create(['name' => 'role-list']);
        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-delete']);  
        
        
        Permission::create(['name' => 'comments-list']);
        Permission::create(['name' => 'comments-edit']);
        Permission::create(['name' => 'comments-create']);
        Permission::create(['name' => 'comments-delete']);  



        Permission::create(['name' => 'search-list']);


        $permission = Permission::get();
        dd($permission);
        
       

        Permission::create(['name' => 'user-list']);
        Permission::create(['name' => 'user-edit']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-delete']);    

        $permission = Permission::get();
        dd($permission);

        
        Permission::create(['name' => 'post-list']);
        Permission::create(['name' => 'post-edit']);
        Permission::create(['name' => 'post-create']);
        Permission::create(['name' => 'post-delete']);    
        $permission = Permission::get();
        dd($permission);
        dd($request);
        
        $roles = Role::get();

        $role1 = Role::create(['name' => 'Admin']);        
        $role2 = Role::create(['name' => 'Other']);

        $roles = Role::get();
        dd($roles);
        */

        
        $data = User::orderBy('created_at','ASC')->with('userimage')->paginate(50);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //dd('$request');
        $roles = Role::pluck('name','name')->all();
        //$university = University::where('status', 'yes')->pluck('name','id')->toArray();
        
        return view('users.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldRequest $request)
    {   
        //dd($request);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $validatedData = $request->validated();     
        $user = User::create($validatedData);
        $lastInsertedId= $user->id;
     


        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //dd($id);

        //$post_count = User::find($id)->post->count();
        $post = User::find($id)->post;
        $post_count = $post->count();
        $title  ="User page";
        


        //dump($post_count);
        //Gate::allows('isSuperadmin');
        $user = User::with('userimage')->find($id);
        
    
    return view('users.show',compact('title','user','post_count','post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        

        
        
        return view('users.edit',compact('user','roles','userRole',));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateFieldRequest $request, $id)
    {   
        
        $input = $request->all();
        
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);

        
        $validatedData = $request->validated(); 

        $user->update($validatedData);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        //dd($user);
        return redirect()->route('users.index');
    }

           
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //dd($id);
        User::find($id)->delete();       

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    
}