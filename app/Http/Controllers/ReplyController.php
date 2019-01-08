<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Topic;
use App\Reply;
use Auth;
use App\User;
use App\Http\Requests\ReplyRequest;





class ReplyController extends Controller
{
    
  public function __construct()
    {
        $this->middleware('auth');
    }


public function index() {

    $threads = Thread::getAllLatest()->get();

    return view('replies.index', compact('threads', 'currentUserId'));


}


public function  newreply ($id){

 $thread = Thread::find($id);

 return view('replies.create', compact('thread'));


}






public function create(ReplyRequest $request) {

$data = [
'body'=>$request->get('body'),
'name'=>$request->get('name'),
'email'=>$request->get('email'),
];

$rpl = new Reply;
$rpl->thread_id = (int)$request->get('thread_id');
$rpl->user_id = (int)$request->get('user_id');
$rpl->body = $request->get('body');
$rpl->ip = $request->ip();
$rpl->save();



\Mail::send('emails.reply', $data, function($message)
{

$message->from(env('MAIL_FROM'));
$message->to(env('MAIL_FROM'), env('MAIL_NAME'));
$message->subject('Reply on thread');
});


return redirect('/replysthanks');


}



}
