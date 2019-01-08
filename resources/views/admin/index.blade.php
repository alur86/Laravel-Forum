@extends('layouts.app')
@section('content')

<div class="container spark-screen">
<div class="row">
<div class="panel panel-default">
<div class="panel-heading"><h3>{{Auth::user()->name}} {{$title}}</h3></div>
<div class="panel-body">
 <h1>Admin Area</h1>
@foreach ($threads as $thread) 
<h3>Thread Title:</h3>
 <div class="col-md-6">
<h3>{{$thread->title}}</h3>
 </div>
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