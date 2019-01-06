@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
<div class="panel panel-default">
<div class="panel-body">
<div class="row text-center">  
<h2>Topic Title:{{$topic->title}}</h2>
</div>
</div>
<br>
<br>
<h4> There are  <b>{{$count_results}} </b> threads in this topic</h4>
<br><br><br>
<div class="row text-center">  
@if (count($count_results) > 0)
<h3 class="section-title">Search</h3>
<div class="form-group">    
<form class="typeahead" role="search" method="GET" action= "{{ url('/search') }}">
<input id="topic_id" name="topic_id"  type="hidden" value="{{$topic->id}}">
<div class="form-group">
@if ($errors->has('query'))
<span class="help-block">
<strong>{{ $errors->first('query') }}</strong>
</span>
@endif
<input type="search" name="query" id="query" placeholder="Search" type="search">
</div>
<div class="form-group">
<input id="btn-submit" class="btn btn-send-message btn-md" value="Search" type="submit">
<span class="glyphicon glyphicon-search"></span>
 </button>
</div>
</form>
<br>
<br> 
@foreach ($topic_threads as $thread)
<label for="name" class="col-md-4 control-label">Title</label>
 <div class="col-md-6">
<h3>Thread Title:{{$thread->title}}</h3>
 </div>
<a href="{{ URL::to('thread_show/'.$thread->id) }}">Read it...</a>
</div>
@endforeach
</div>
{!! $topic_threads->links() !!}
</div>
@else
<p>No any data available now here</p>
@endif
</div>
</div>
</div>
@endsection











