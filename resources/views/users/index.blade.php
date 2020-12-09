@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-10 margin-tb">
        
            <h2>Users Management</h2>
            
        
       
    </div>
    <div class="col-lg-2 margin-tb">
        
           
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        
       
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

{!! Form::open(array('route' => 'search.userfulltextfrm','method'=>'GET')) !!}
  <div class="row">
       
      <div class="col-lg-8">
              @if( request()->get('text') )
              {!! Form::text('text', request()->get('text'), array('required','placeholder' => 'Full Text User Search','class' => 'form-control')) !!}  
              @else
              {!! Form::text('text', null, array('placeholder' => 'Full Text User Search','class' => 'form-control')) !!}
              @endif
      </div>
      <div class="col-lg-4"> 
      <button type="submit" class="btn btn-primary">Search User</button>
      </div>  
       
  </div>
{!! Form::close() !!}

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

<p class="text-center text-primary">
  <!--Footer Comes Here-->
</p>
@endsection