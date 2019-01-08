@extends('layouts.app')
@section('content')

<div>

<div class="container">
<div class="row">
<h2>Topic Title: {{$topic->title}}</h2>
<br>
<br> 
<div class="form-group">
@if (count($threads_search) > 0) 
<br>
<br>
<br>
 <h3>Search results: <i>{{$query}} </i></h3>
 <h3>Found: {{$total}} matches</h3>    
<div class="row text-center">             
@foreach ($threads_search as $thread)
 <br><h4>Thread Content:</h4><br>
 <br><br>
<a href="{{ URL::to('thread_show/'.$thread->id) }}">
 {!!strlen($thread->content) > 100 ? substr($thread->content,0,100) : $thread->content!!}</a><br>
@endforeach 
</div>
<br>
<br>
<h3 class="section-title">Search</h3>
<div class="form-group">    
<form class="typeahead" role="search" method="GET" action= "{{ url('/topic_search') }}">
 {{ csrf_field() }}
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




      






            

















            





