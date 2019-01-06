@extends('layouts.app')
@section('content')

<div>

<div class="container">
<div class="row">
<h2> {{$thread->title}}</h2>
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
 <div class="form-group">
@if (count($threads_search) > 0) 
 <h3>Search results: <i>{{$query}} </i></h3>
 <h3>Found: {{$total}} matches</h3>    
<div class="row text-center">             
@foreach ($threads_search as $thread)
<a href="{{ URL::to('thread_show/'.$thread->id) }}">
 <br>Content: {{$thread->content}}<br>
@endforeach 
</div>
{!! $threads_search->links() !!}
</div> 
@else
 <h3>Search results: <i>{{$query}} </i></h3>
 <h3>Found: {{$total}} matches</h3>  
@endif
</div>
</div>
</div>
</div>
</div>
</div>
@endsection




      






            

















            





