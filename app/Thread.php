<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Thread extends Model
{
   


protected $fillable = [
      'title','content' 
  ];


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




public static function RemoveLast($user_id) {

$thrd = Thread::where('user_id','=',$user_id)->orderBy('updated_at','desc')->limit(5)->first()->delete();


}




}
