@extends('layouts.app')
@section('content')

  <div class="container spark-screen">
  <div class="row">
  <div class="panel panel-default">
  <div class="panel-heading"><h3> {{$title}}{{Auth::user()->name}}</h3></div>
  <div class="panel-body">
 <div class="col-md-6">
 @if (count($count_results) >= 5) 
 <h1>Please, note that you can add no more then 5 threads</h1>
@foreach ($threads as $thread)
<h3>Thread Title:</h3>
 <div class="col-md-6">
<h3>{{$thread->title}}</h3>
 </div>
<br><a href="{{ URL::to('mythread_show/'.$thread->id) }}">View</a><br>
<br><a href="{{ url('/edit_mythread') }}">Edit MyThread</a></br> 
</div>
</div>  
@endforeach
                 
@else

@foreach ($threads as $thread)
<h3>Thread Title:</h3>
 <div class="col-md-6">
<h3>{{$thread->title}}</h3>
 </div>
 </div>
<a href="{{ URL::to('mythread_show/'.$thread->id) }}">View</a><br>
 <br><a href="{{ url('/edit_mythread/.$thread->id') }}">Edit MyThread</a><br> 
 <br><a href="{{ url('/add_mythread') }}">Add MyThread</a></br> 
@endforeach

 </div>

@endif

<hr>
 



@endsection
