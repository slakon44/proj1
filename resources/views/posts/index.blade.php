@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">posts.index.blade.php </div>
                  <a href="/posts/create" class="btn btn-info"> Posts create  >></a>

                  <!-- z usera znajdz po id _usera posty names = User::find(3)->name -->
                  <h1>List of posts</h1>
                    @if(Auth::check())
                      @if(count($posts) > 0)
                          @foreach ($posts as $post)
                            <div class="well">
                              <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
                              <small>{{$post->created_at}} by {{ $post->user->name}}</small>
                              <div class="p-3 mb-2 bg-secondary text-white">{!!$post->text!!}</div>
                            </div>
                          @endforeach

                      @else
                          <p>No posts</p>
                      @endif

                    @endif
            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see the list  >></a>
            @endif
        </div>
    </div>

</div>
@endsection
