@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $title }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">

@if($user)
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                   

            @if(!empty($user_university))
                <strong>University/Organization:</strong> 
                @foreach($user_university as $data)                
                <label class="badge badge-success">{{ $data->name }}</label>
                @endforeach
            @endif


        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>No of Posts</strong> 
        <label class="badge badge-success">{{ $post_count }}</label>
        </div>
    </div>
</div>

@if($user->userimage)

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
        <strong>Userimage:</strong>
            
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group"> 
        <img src="{{ $user->userimage->src }}" title="{{$user->userimage->title}}" alt="{{$user->userimage->title}}" >
        <p>{{$user->userimage->description}}</p>
        </div>
    </div>
</div>

@endif 

@endif
   
   
   
    @if(!empty($post_count))
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                   
         
        

        
        <table class="table table-bordered">
            <tr>
                <th>Post Title</th>
                <th>Sub Title</th>
                <th>Published</th>               
                <th>Action</th>
            </tr>

            @foreach($post as $data)   
            

    @if($data->active  =='yes')         
            <tr class="table-success">
    @else
            <tr class="table-warning">       
    @endif
                <td>{{ $data->title }}</td>
                <td>{{ $data->subtitle }}</td>
                <td>{{ $data->published_at }}</td>
               

                <td>
                <form action="{{ route('posts.destroy',$data->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posts.show',$data->id) }}">Show</a>
                    @can('post-edit')
                    <a class="btn btn-primary" href="{{ route('posts.edit',$data->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('post-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
                </td>               
               
                
            </tr>
            @endforeach
        </table>            
               

        </div>
    </div>

    

    @endif

</div>


@endsection