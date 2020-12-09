@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'posts.store','method'=>'POST')) !!}

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        {!! Form::text('subtitle', null, array('placeholder' => 'subtitle','class' => 'form-control')) !!}
        </div>
    </div>
</div>   

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
        {!! Form::text('img_title', null, array('placeholder' => 'Image Title','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
        {!! Form::text('img_src', "https://via.placeholder.com/400x300.png/009946?text=voluptatem", array('placeholder' => 'https://via.placeholder.com/400x300.png/009946?text=voluptatem','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
        {!! Form::text('img_description', null, array('placeholder' => 'Post Image Description','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Content:</strong>
            {!! Form::textarea('content',null,['class'=>'form-control', 'rows' => 2, 'cols' => 20]) !!}
            <input type="hidden" id="author_id" name="author_id" value= "{{ $loggedin_userid }}">
            <input type="hidden" id="mime_type" name="mime_type" value= "image/png">
            @csrf
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>          
        </div>
    </div>
</div>

</div>
{!! Form::close() !!}


@endsection