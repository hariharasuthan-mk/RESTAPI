@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      
@endif

<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
<table class="table table-hover">
  <thead>
    <tr>
      <th>Add new comment to {{ $posts->title }}</th>
      <th>By User as </th>
    </tr>
  </thead>
  <tbody>

      
        <tr>
            <input type="hidden" id="author_id" name="author_id" value= "{{ $loggedin_userid }}">
            @csrf

            <td>
              <input type="text" class="form-control" name="subtitle" placeholder="subtitle" value="">
            </td>
            <td>
             {!! Form::textarea('content',null,['class'=>'form-control', 'placeholder'=>'comments','rows' => 2, 'cols' => 20]) !!}
            </td>
            
            <input type="hidden" id="post_id" name="post_id" value= "{{ $id }}">
            <td>
              <!--<button type="submit" class="btn btn-primary btn-sm">Create</button>-->
              <input type="submit" class="btn btn-secondary" value="Add New Comment ">
            </td>


        </tr>

        <tr>
          <td></td>
          <td colspan="2"></td>
        </tr>


  </tbody>
</table>
</form>