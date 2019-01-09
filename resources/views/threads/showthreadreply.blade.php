@extends('layouts.app')
@section('content')
<div class="container spark-screen">
<div class="row">
<div class="panel panel-default">
<div class="panel-heading"><h3>{{Auth::user()->name}} {{$title}}</h3></div>
<div class="panel-body">

<div class="col-md-6">
<h3>Topic Title:</h3>
<select name="topic_id">
<option selected>Please select one option</option>
@foreach($topics as $topic)
<option value="{{ $topic->id }}">{{ $topic->title }}</option>
@endforeach
</select>
 </div>
 <div class="col-md-6">
 <h3>Thread Title:</h3>
<h5>{{$thread->title}}</h5>
 </div>
 <h3>Thread Content:</h3>
 <h5>{{$thread->content}}</h5>
 </div>
 <hr>

<br><a href="{{ URL::to('/newreply/'.$thread->id) }}">Post Your Reply</a></br>


<h4> There are  <b>{{$replycount}} </b> threads in this topic</h4>
<br><br><br>
 

@if (count($replycount) > 0)
 
    


@foreach ($replies as $reply)
<div class="row text-center"> 
<div class="panel panel-default">
<div class="panel-heading"><h4>Reply Body to this Thread</h4></div>
<div class="panel-body">

<h5>{{$reply->body}}</h5>

 </div>
 </div>
 </div>
 </div>
@endforeach
@else
<h3>No any replies at this thread now</h3>

@endif



















 <br> <p><a href="#" onclick="history.go(-1)"  class="btn btn-primary btn-outline with-arrow">Назад <i class="icon-arrow-right"></i></a></p></p><br> 


 </div>



 



@endsection
