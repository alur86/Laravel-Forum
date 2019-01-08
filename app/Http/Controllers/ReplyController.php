<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Topic;
use App\Reply;
use Auth;
use App\User;


class ReplyController extends Controller
{
    
  public function __construct()
    {
        $this->middleware('auth');
    }





}
