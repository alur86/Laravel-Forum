@extends('layouts.app')
@section('content')

  <div class="container spark-screen">
  <div class="row">
  <div class="panel panel-default">
  <div class="panel-heading"><h3> {{$title}}{{Auth::user()->name}}</h3></div>
  <div class="panel-body">

 <label for="avatar" class="col-md-4 control-label"><strong>Avatar:</strong></label>
 <div class="col-md-6">
<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">                    

 </div>


 <div class="col-md-6">
 <label for="name" class="col-md-4 control-label"><strong>Name:{{ $user->name }}</strong></label>
 </div>

 <div class="col-md-6">
<label for="email" class="col-md-4 control-label"><strong>E-mail:{{ $user->email }}</strong></label>
 </div>

<hr>

 <br><a href="{{ url('/update') }}">Update</a></br>    
 <br><a href="{{ url('/mythreads/. $thread->id) }}">MyThreads</a></br> 


@endsection
