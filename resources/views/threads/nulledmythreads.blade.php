@extends('layouts.app')
@section('content')

  <div class="container spark-screen">
  <div class="row">
  <div class="panel panel-default">
  <div class="panel-heading"><h3>{{Auth::user()->name}} {{$title}}</h3></div>
  <div class="panel-body">
 <div class="col-md-6">
 <h1>Please, note that you can add no more then 5 threads</h1>
 <br><a href="{{ URL::to('/addthread') }}">Add MyThread</a></br> 
 </div>
<br> 
</div>
</div>  

@endsection
