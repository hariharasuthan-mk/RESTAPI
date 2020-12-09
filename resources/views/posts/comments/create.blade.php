@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
</div>


@if($posts->active =="yes")

    @if(count($posts['commentpost']) > 0 ) 

        @include('posts.comments.comment_history')    
        @include('posts.comments.create_frm') 

    @else
    
        @include('posts.comments.create_frm') 

   
    @endif 


@endif 



 
 



@endsection
