@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">pages.index.blade.php - {{$title}}</div>
                    @if(Auth::check())


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
