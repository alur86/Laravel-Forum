<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Auth;
use App\User;



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
    public function index()
    {
       
      $user = Auth::user();

      $uid = $user->id;

      $uname =$user->name;
   
      $title  ="Personal Profile: My Threads ";
   
      $threads = Thread::where('user_id', '=',  $uid)->paginate(3);

      $count_results = Thread::orderBy('created_at')->get()->count();
  
      return view('profile.mythreads')->with('threads',$threads)->with('count_results',$count_results)->with('title',$title)->with('uname', $uname);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = Topic::where('user_id', '=',$user_id)->first();

        return view('profile.createthread',compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request, $id)
    {
        
            $thread = Thread::find((int)$id);

            if (!$thread) {
                return $this->response->errorNotFound('Thread not found');
            }

        } else {
            $thread = new Thread();
        }

        $thread->title      = $request->title;
        $thread->content    = $request->content;
        $thread->user_id    = Auth::user()->id;
        $thread->topic_id   = $request->topic_id;
        $thread->created_at   = date("Y-m-d H:i:s");
        $thread->save();
     
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        $user_id = Auth::user()->id;

        $topic = Topic::where('user_id', '=',$user_id)->first();

        $thread = Thread::where('id', $thread->id);

        return view('profile.showthreads', compact('thread','topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        $thread = Thread::where('id', $thread->id);

        return view('profile.editthreads', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request, $id)
    {
        $id = (int)$id;
        if (Auth::check()) {
            $thread = Thread::where('id', $id)->first();
            $user_id = Auth::user()->id;
            if ($thread->user_id === $user_id) {
                $thread->delete();
            } else {
                return back()->with(['message' => 'You can\'t delete this thread']);
            }
        } else {
            return redirect('/login')->with([ 'message' => 'You need to be logged in in order to delete a thread.' ]);
        }
    }
}



