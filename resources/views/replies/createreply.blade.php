@extends('layouts.app')
@section('content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading"><h3>{{Auth::user()->name}} {{$title}}</h3></div>
  <div class="panel-body">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/createreply') }}">
  <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
  <input id="uname" type="hidden" class="form-control" name="uname" value="{{ Auth::user()->name }}">
  <input id="thread_id" type="hidden" class="form-control" name="thread_id" value="{{ $thread->id }}">
  {{ csrf_field() }}
@if (Auth::guest())
<h3>You must registered that to see and work with the threads and replies</h3>
             
@else
<div class="col-md-6">
<h3>Thread:{{ $thread->title }}</h3>
</div>


 <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
 <label for="content" class="col-md-4 control-label">Reply Body</label>
 <div class="col-md-6">
 <textarea id="body" class="form-control" cols="50" rows="10" name="body">
 </textarea>
 @if ($errors->has('body'))
<span class="help-block">
<strong>{{ $errors->first('body') }}</strong>
</span>
 @endif
 </div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Submit
</button>
</div>
</div>
</div>
@endif		
@endsection

