@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">posts.show.blade.php </div>
                  <a href="/posts" class="btn btn-primary">Back</a>
                  <h1>{{$post->title}}</h1>
                    @if(Auth::check())
                            <div>
                              <div class="p-3 mb-2 bg-secondary text-white">{!!$post->text!!}</div>
                              <hr>
                              <small>Written on {{$post->created_at}}</small>
                            </div>
                    @endif
            </div>
            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right']) !!}
                      {{Form::hidden('_method','DELETE')}}
                      {{Form::submit('DELETE',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
                    @if(Auth::guest())
                      <a href="/login" class="btn btn-info"> You need to login to see the list  >></a>
                    @endif
                @endif
            @endif
        </div>
    </div>

</div>
@endsection
