@extends('layouts.app')
@section('content')

<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h3>Forum Topics:<h3></div>
<div class="panel-body">
@if (count($count_results) > 0)
@foreach ($topics as $topic)
<a class="btn btn-primary btn-outline" href="{{ URL::to('topic_show/'.$topic->id) }}">{{$topic->title}}</a>
 </div>
 </div>
 </div>
  @endforeach
</div>
</div>
{!! $topics->links() !!}
@else
<p>No any topics available now</p>
@endif
@endsection
 </div>
 </div>









