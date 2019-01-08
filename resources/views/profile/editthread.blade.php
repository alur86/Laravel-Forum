@extends('layouts.app')
@section('content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading"><h3>{{Auth::user()->name}} {{$title}}</h3></div>
  <div class="panel-body">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/updthread') }}">
  <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
   <input id="thread_id" type="hidden" class="form-control" name="thread_id" value="{{ $thread->id }}">
  {{ csrf_field() }}

<div class="form-group{{ $errors->has('topic_id') ? ' has-error' : '' }}">
<select name="topic_id">
     <option selected disabled>Please select one option</option>
     @foreach($topics as $topic)
     <option value="{{ $topic->id }}">{{ $topic->title }}</option>
     @endforeach
    </select>  
 </div>

 
 <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
<label for="title" class="col-md-4 control-label">Title</label>
<div class="col-md-6">
<input id="title" type="text" class="form-control" name="title" value="{{ $thread->title }}" >
@if ($errors->has('title'))
<span class="help-block">
<strong>{{ $errors->first('title') }}</strong>
</span>
 @endif
 </div>
</div>


 <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
 <label for="content" class="col-md-4 control-label">Content</label>
 <div class="col-md-6">
 <textarea id="content" class="form-control" cols="50" rows="10" name="content">
  {{ $thread->content }}
 </textarea>
 @if ($errors->has('content'))
<span class="help-block">
<strong>{{ $errors->first('content') }}</strong>
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
		
@endsection






