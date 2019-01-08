@extends('layouts.app')
@section('content')

  <div class="container spark-screen">
  <div class="row">
  <div class="panel panel-default">
  <div class="panel-heading"><h3>{{Auth::user()->name}} {{$title}}</h3></div>
  <div class="panel-body">
 <div class="col-md-6">
 <h1>Please, note that you can add no more then 5 threads</h1>
@foreach ($threads as $thread)
 <br><a href="{{ URL::to('/addthread') }}">Add MyThread</a></br> 
<h3>Thread Title:</h3>
 <div class="col-md-6">
<h3>{{$thread->title}}</h3>
 </div>
<br><a href="{{ URL::to('mythread_show/'.$thread->id) }}">View Thread</a><br>
<br><a href="{{ URL::to('/edit_mythread/'.$thread->id) }}">Edit Thread</a></br>
<form method="DELETE" action="{{ URL::to('/delete_mythread/'.$thread->id) }}" class="form-control-lg">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-primary bg-danger">
            Delete Thread
        </button>
    </form>
<br> 
</div>
</div>  
@endforeach





@endsection
