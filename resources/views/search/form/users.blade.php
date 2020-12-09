@extends('layouts.app')


@section('content')



{!! Form::open(array('route' => 'search.userfulltextfrm','method'=>'GET')) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Full Text User Search:</strong>
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


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          
        <table class="table table-hover table-condensed">
  <thead class="thead-dark">
  <th>No</th>
    <th>Name</th>
    <th>Fullname</th> 
    <th>Email</th>
    <th>Roles</th> 
    <th>Profile Image</th>
    <th width="280px">Action</th>
  </thead>

 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    @if($user->fullname  =='') 
      <td class="text-center">&#10007;</td>
      @else
      <td class="text-center">{{ $user->fullname }}</td>  
    @endif 
    </td>
    <td>{{ $user->email }}</td>
    
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    
    @if($user->userimage)
      <td class="text-center">&#9989;</td>
    @else
      <td class="text-center">&#10007;</td>
    @endif
    
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}
          
        </div>
    </div>
    
    
</div>


@endsection