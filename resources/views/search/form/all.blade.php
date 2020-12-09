@extends('layouts.app')


@section('content')



{!! Form::open(array('route' => 'search.fulltextfrm','method'=>'GET')) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Full Text Search:</strong>
            @if( request()->get('text') )
            {!! Form::text('text', request()->get('text'), array('required','placeholder' => 'Keyword','class' => 'form-control')) !!}  
            @else
            {!! Form::text('text', null, array('placeholder' => 'Keyword','class' => 'form-control')) !!}
            @endif

          
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection