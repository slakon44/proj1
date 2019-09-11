@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">posts.edit.blade.php </div>
                  <h1>Posts</h1>


                    @if(Auth::check())

                    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=>'POST']) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title',$post->title,['class'=>'form-control', 'placeholder'=>'Title'])}}

                    </div>
                    <div class="form-group">
                    {{Form::label('body', 'Text')}}
                    {!!Form::textarea('body',$post->text,['id'=>'editor1','class'=>'form-control', 'placeholder'=>'Text'])!!}
                    {!! Form::hidden('_method', 'PUT') !!}
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
