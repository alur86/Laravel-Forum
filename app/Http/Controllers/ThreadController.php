<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Topic;
use App\Reply;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests\ThreadRequest;


class ThreadController extends Controller
{
    
  public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
       
      $user = Auth::user();
      $uid = $user->id;
      $uname =$user->name;
      $count_results = Thread::orderBy('id')->get()->count(); 

      if ($count_results == 5) {

       Thread::RemoveLast($uid);
     
  return view('threads.nulledmythreads')->with('title',$title)->with('uname', $uname);
       

     }
    
     else {
   
      $title  ="Personal Profile: My Threads ";
      $threads = Thread::where('user_id', '=',  $uid)->paginate(3);
    
  
      return view('threads.mythreads')->with('threads',$threads)->with('count_results',$count_results)->with('title',$title)->with('uname', $uname);
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if (!Auth::check()) {
            return $this->response->errorNotFound('You need to be logged in!');
        }

      $user = Auth::user();
      $uid = $user->id;
      $uname =$user->name;
      $title  ="Personal Profile: Add New Thread";
      $topics = Topic::orderBy('created_at')->get();

        return view('threads.createthread',compact('topics', 'title','uname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(ThreadRequest $request) {
        
        $thread = new Thread();
        $thread->title      = $request->title;
        $thread->content    = $request->content;
        $thread->user_id    =  $request->user_id;
        $thread->topic_id   = $request->topic_id;
        $thread->created_at   = date("Y-m-d H:i:s");
        $thread->save();
    
        return redirect('/mythreads');
     
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        if (!Auth::check()) {
            return $this->response->errorNotFound('You need to be logged in!');
        }

        $title = "Personal Profile: Thread Details";

        $user_id = Auth::user()->id;

        $topics = Topic::orderBy('created_at')->get();

        $thread = Thread::where('id', '=', $thread->id)->first();

        $replycount = Reply::where( 'thread_id', '=',  $thread->id)->get()->count();

        if ($replycount == 0) {

        return view('threads.showthread', compact('thread','topics','title'));

        }

          else {

    $replies = Reply::where( 'thread_id', '=',  $thread->id)->get();

   return view('threads.showthreadreply', compact('thread','topics','title','replycount','replies'));
     }

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        if (!Auth::check()) {
            return $this->response->errorNotFound('You need to be logged in!');
        }

        $title = "Personal Profile: Edit Thread ";

        $user_id = Auth::user()->id;

        $topics = Topic::orderBy('created_at')->get();

        $thread = Thread::where('id', $thread->id)->first();

        return view('threads.editthread', compact('thread','topics','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadRequest $request)
    {
       if (!Auth::check()) {
            return $this->response->errorNotFound('You need to be logged in!');
        }

        $uid=(int)$request->get('user_id');
        $thread_id=(int)$request->get('thread_id');
        $topic_id = (int)$request->get('topic_id');

        $thread = Thread::where('id', '=',$thread_id)->first();

        $thread->title      = $request->title;
        $thread->content    = $request->content;
        $thread->user_id    = $uid;
        $thread->topic_id   = $topic_id;
        $thread->updated_at   = date("Y-m-d H:i:s");
        $thread->save();

 
        return redirect('/mythreads');


}

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
         $id = (int)$id;

        if (Auth::check()) {

            $thread = Thread::where('id','=', $thread->id)->first();

             $thread->delete();

               return redirect('/mythreads');

            } else {
                
                return back()->with(['message' => 'You can not delete this thread']);
            }
        
        
    }


}



