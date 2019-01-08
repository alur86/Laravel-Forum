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

    return view('replies.index', compact('threads'));


}


public function  newreply ($id){


  if (!Auth::check()) {
            return $this->response->errorNotFound('You need to be logged in!');
        }

 $title = "New Reply";
 $thread = Thread::find($id);

 return view('replies.createreply', compact('thread','title'));

}


public function create(ReplyRequest $request) {

$thread_id = (int)$request->get('thread_id');


$thread = Thread::where('id', '=', $thread_id)->first();

$uid=$thread->user_id;

$user = User::where('id', '=', $uid)->first();

$uemail =$user->email;

$uname = $user->name;

$data = [
'body'=>$request->get('body'),
'name'=>$request->get('name'),
'email'=>$request->get('email'),
];

$udata = [
'body'=>$request->get('body'),
'name'=>$uname,
'email'=>$uemail,
];


$rpl = new Reply;
$rpl->thread_id = $thread_id;
$rpl->user_id = (int)$request->get('user_id');
$rpl->body = $request->get('body');
$rpl->ip = $request->ip();
$rpl->save();



\Mail::send('emails.ccreply', $udata, function($message)
{

$message->from(env('MAIL_FROM'));
$message->to(env('MAIL_FROM'), env('MAIL_NAME'));
$message->subject('Reply on thread');
});



\Mail::send('emails.reply', $data, function($message)
{

$message->from(env('MAIL_FROM'));
$message->to(env('MAIL_FROM'), env('MAIL_NAME'));
$message->subject('Reply on thread');
});




return redirect('/thanks');


}



}
