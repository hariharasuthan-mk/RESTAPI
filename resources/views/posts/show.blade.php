@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Post - {{ $posts->title }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
        <strong>Posted History</strong>            
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">           
        <b>Published on&nbsp;</b>{{ $posts->published_at }}<br/> 
        <b>Created&nbsp;</b>{{ $posts->created_at }}<br/>
        <b>Updated&nbsp;</b>{{ $posts->updated_at }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <strong>Title:</strong>
            
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">           
            {{ $posts->title }} -  {{ $posts->author_id }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
        <strong>Subtitle:</strong>
            
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">           
        {{ $posts->subtitle }}
        </div>
    </div>
</div>
@if($posts->postimage)

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
        <strong>postimage:</strong>
            
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group"> 
         <img src="{{ $posts->postimage->src }}" title="{{$posts->postimage->title}}" alt="{{$posts->postimage->title}}" >
         <p>{{$posts->postimage->description}}</p>
        </div>
    </div>
</div>

@endif 

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
        <strong>Content:</strong>
            
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">           
        {{ $posts->content }}
        </div>
    </div>
</div>



@if($posts->active =="yes")

    @if(count($posts['commentpost']) > 0 ) 

    

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
            <strong>No of comments - {{count($posts['commentpost'])}}</strong>            
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
            <strong>
                <a href="{{route('postcomments.add', $id)}}" class="btn btn-info btn-xs" >View comments</a>
            </strong> 
           
            </div>
        </div>
       
    </div>
    @else
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
            <strong>There is no comments</strong>            
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">           
                
            <strong>
                <a href="{{route('postcomments.add', $id)}}" class="btn btn-info btn-xs" >Add comments</a>
            </strong>          

            
            
        
            </div>
        </div>
    </div>    
    @endif 

@else

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 bg-danger text-center">
            <div class="form-group ">
            <strong>&#10007; User could not able to post any comment Until This post  published</strong>            
            </div>
        </div>
        
</div>

@endif 
    
</div>


@endsection