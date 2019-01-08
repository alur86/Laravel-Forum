@extends('layouts.app')
@section('content')
<div class="container spark-screen">
<div class="row">
<div class="panel panel-default">
<div class="panel-heading"><h3>{{Auth::user()->name}} {{$title}}</h3></div>
<div class="panel-body">
<div class="col-md-6">

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
 {{ str_limit($thread->content, $limit = 75, $end = '...') }}
 </div>
 <hr>

<br><a href="{{ URL::to('/newreply/'.$thread->id) }}">Post Your Reply</a></br>

 <br> <p><a href="#" onclick="history.go(-1)"  class="btn btn-primary btn-outline with-arrow">Назад <i class="icon-arrow-right"></i></a></p></p><br> 


 </div>



 



@endsection
