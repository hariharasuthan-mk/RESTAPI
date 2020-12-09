@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> {{ $title }}</h2>
        </div>
       
    </div>
</div>


<div class="row">


    @if(!empty($post))
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

        <p>
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
</p>
                   
         
        <table class="table table-hover table-condensed">
            
            <thead class="thead-dark">
                <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
                
                </tr>
            </thead>

            <tbody>
                
            <tr>       
                
                    <td>
                        <b>Post Title:</b> {{ $post['title'] }}<br/>
                        <b>Sub Title:</b> {{ $post['subtitle'] }}
                    </td> 
                    <td>
                        {{ $post['content'] }} <br/><br/>
                    
                        <p> 
                                <b>Published on&nbsp;</b>{{ $post['published_at'] }}<br/> 
                                <b>Author by&nbsp;</b>

                                <small>

                                @foreach($post_author as $data)                                  
                                    <a class="btn btn-info" href="{{ route('users.show',$data->id) }}">{{$data->name}}</a>
                                @endforeach
                                   
                                </small><br/>
                                <b>Created&nbsp;</b>{{ $post['created_at'] }}<br/>
                                <b>Updated&nbsp;</b>{{ $post['updated_at'] }}
                        </p>
                    
                    </td>    
                    <td>
                    <form action="{{ route('posts.destroy',$post['id']) }}" method="POST">
                        
                        @can('post-edit')
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post['id']) }}">Edit</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('post-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                    </td>               
                
            </tr>

            
            <tr>
                
                   @if($post->active  =='no')         
                <td colspan="4" class="bg-danger">User can not add their comment until this post pubslished/active </td> 
                    @else
                <td colspan="4" class="bg-success">comment form comes here</td>   
                    @endif
              
               
                
                                        
               
                
            </tr>

            </tbody>
           
        </table>                      
               

        </div>
    </div>

    

    @endif

</div>





@endsection