<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\Thread;





class AdminController extends Controller
{
        
  public function __construct()
    {
        $this->middleware('auth');
    }

}



 public function index() {
   
 $user = Auth::user(); 
 $uname = Auth::user()->name; 
 
 $title ="Admin Aread ". $uname;
 $threads = Thread::orderBy('created_at')->paginate(15);

 return view('admin.index',compact('title', 'threads'));


}