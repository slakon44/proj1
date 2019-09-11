@extends('layouts.app')
@section('content')

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">posts.create.blade.php - {{$title}}</div>
                  <h1>Posts</h1>


                    @if(Auth::check())

                    {!! Form::open(['action' => 'PostsController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title','',['class'=>'form-control', 'placeholder'=>'Title'])}}

                    </div>
                    <div class="form-group">
                    {{Form::label('body', 'Text')}}
                    {{Form::textarea('body','',['id'=>'editor1','class'=>'form-control', 'placeholder'=>'Text'])}}
                  
                     </div>
                    <div class="form-group">
                        {{Form::file('cover_image')}}


                    </div>
                {{Form::submit('Zapisz!',['class'=>'btn btn-primary'])}}
                    <?php
                    //laravelcollective
                   // echo Form::radio('category_id', '1');
                    //echo Form::date('name', \Carbon\Carbon::now());
                   // echo Form::select('size', ['L' => 'Large', 'S' => 'Small']);
                    ?>
                    {!! Form::close() !!}

                      <!-- Table -->
                     <?php /*  <table class="table">
                          <tr>
                              <th>Character</th>
                              <th>Real Name</th>
                          </tr>
                        @foreach($characters as $key => $value)
                            <tr>
                              <td>{{ $key }}</td><td>{{ $value }}</td>
                            </tr>
                          @endforeach
                      </table>*/?>
                    @endif
            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see the list  >></a>
            @endif
        </div>
    </div>

</div>
@endsection
