<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Search\FieldRequest;
use App\User;
use App\Traits\FullTextSearch;
use App\Traits\StudentTrait;

class SearchController extends Controller
{
    //use FullTextSearch;
    use StudentTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function userfulltextfrm(Request $request){
        
        
        //dump($request['text']);$allParameters = \Request::query();print 'Hello';dump($allParameters);

        $q = $request['text'];
     
        /*
        $msg = $this->fullTextWildcards($q);
        dump($msg);
        */

        $columns = 'name,email,fullname';

        $data = User::where('email', "!=" ,null)
        ->select(['id', 'name', 'fullname', 'email'])
        ->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($q))
        ->with('userimage')->paginate(50);// ->paginate(10);
         //dump($data);

       
         

        return view('search.form.users',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function fulltextfrm(Request $request)
    {
        //dump($request);
        dump($request['text']);
        return view('search.form.all');
        
    }

   
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validated(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validated(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
