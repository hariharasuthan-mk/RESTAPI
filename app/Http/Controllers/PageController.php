<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PageController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function __invoke($page,Request  $request)
    {

       
        $route = \Request::route();//var_dump($route->wheres['pages']);

        if(null !==($request->route()->getPrefix())){
            $url_prefix = ucfirst(ltrim($request->route()->getPrefix(),'/'));
        }        
        else{
             $url_prefix = ucfirst('general');
        }
        
        //var_dump(ucfirst($url_prefix));

        $hospitals = array("hsdfgdf","dshfsdhf","hhdf");        
        $path = $url_prefix.'.'.$page;

        $data = [
            'title' => ucwords($page),
            'hospital_data' => $hospitals ,
        ];


        return view('frontend.page.'.$path,$data);

    }
}
