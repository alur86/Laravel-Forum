<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    

protected $fillable = [
      'user_id','body' 
  ];



 public $timestamps = true;	
    
 protected $table = 'replies';


  public function user()
    {
        return $this->belongsTo(User::class);
    }



 public function thread()
    {
        return $this->belongsTo(Thread::clas);
    }


 


}
