<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Thread extends Model
{
   


protected $fillable = [
      'title','content' 
  ];

 const LIMIT = 5;

 public $timestamps = true;	
    
 protected $table = 'threads';


  public function user()
    {
        return $this->belongsTo(User::class);
    }



 public function topic()
    {
        return $this->hasOne(Topic::class);
    }

 public function replies()
    {
        return $this->hasMany(Reply::class);
    }

 public function CheckLimit() {
   
   $limits = DB::table('threads')->Orderby('id', 'desc')->limit(5)->count();
  
   if ($limits >= LIMIT) {
  
   return true;

   }

   else {

   return false ;

   }

 }


public function RemoveLast($user_id) {

$thrd = Thread::where('user_id','=',$user_id)->limit(5)->latest()->get();

$thrd-> delete();


}




}
