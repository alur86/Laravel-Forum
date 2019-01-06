<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

use Image;

use View;

use Illuminate\Http\UploadedFile;


class ProfileController extends Controller
{
    
  public function __construct()
    {
        $this->middleware('auth');
    }



 public function index() {
   
 $user = Auth::user(); 
 $user_id = Auth::user()->id; 
 $uname = Auth::user()->name; 
 
 $title ="Personal Profile ". $uname;


 return view('profile.index',compact('title'))->with('user',$user)->with('title', $title);


}

 public function update() {
   
 $user = Auth::user(); 
 $user_id = Auth::user()->id; 
 $uname = Auth::user()->name; 
 $title ="Personal Profile ". $uname;

 return view('profile.update',compact('title'))->with('user',$user)->with('title', $title);


}



  public function updateProfile(Request $request){

          if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();   
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' .$filename ));
            $uid=$request->get('user_id'); 
            $user = User::where('id','=', $uid)->first();
            $user->avatar = $filename;  
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
          }

    return redirect('profile');

}



}
