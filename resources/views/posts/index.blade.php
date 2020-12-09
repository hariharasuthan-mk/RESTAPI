@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Post Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-hover table-condensed">
<thead class="thead-dark">
   <th class="text-center">No</th>
   <th class="text-center">title</th>
   <th class="text-center">Published at</th>  
   <th class="text-center">No of Comments</th>  
   <th class="">Post Image</th>
   <th class="text-center">Author</th>   
   <th class="text-center" width="280px">Action</th>
 </thead>


 @foreach ($data as $key => $post)


<?php
//dump($post['author_by']);dump($post['commentpost']);print count($post['commentpost']);
//dd($post['author_by'][0]['id']);
?>


<tr>
    <td class="text-center">{{ ++$i }}</td>

            
    <td class="clickable text-center"> 
      <a  href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a>
    </td>

    @if($post->active  =='no') 
    <td class="text-center">&#10007;</td>
      @else
    <td class="text-center">{{ $post->published_at }}</td>  
    @endif 
    <td class="text-center">
    {{ count($post['commentpost']) }}
    </td> 
    
     
    @if($post->postimage)
    <td class="text-center">&#9989;</td>
    @else
      <td class="text-center">&#10007;</td>
    @endif
      
    <td class="text-center">{{$post['author_by'][0]['name']}}</td>

    <td class="text-center">
       
       <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

<p class="text-center text-primary">
  <!--Footer Comes Here-->
</p>
@endsection