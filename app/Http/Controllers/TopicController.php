<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Thread;
use App\Topic;

use App\Http\Requests\SearchFormRequest;



class TopicController extends Controller
{
    


public function index() {

$topics = Topic::orderBy('created_at')->paginate(10);

$count_results = Thread::orderBy('created_at')->get()->count();
  
return view('topics.index')->with('topics',$topics)->with('count_results',$count_results);

}




public function show($id) {
 
$topic = Topic::findOrFail($id);

$count_results = Thread::where('topic_id', '=',$id)->get()->count();

$topic_threads = Thread::where('topic_id', '=',$id)->paginate(10);

return view('topics.show')->with('topic',$topic)->with('topic_threads',$topic_threads)->with('count_results',$count_results);

}



public function search(SearchFormRequest $request) {

$query = $request->get('query');

$topic_id = int($request->get('topic_id'));

$topic = Topic::findOrFail($topic_id);

$threads_search = Thread::where('title', 'LIKE', "%$query%")->paginate(10);

$total = Thread::where('title', 'LIKE', "%$query%")->count();

return view('topics.search')->with('threads_search',$threads_search)->with('total',$total)->with('topic',$topic)->with('query',$query);


}

}
