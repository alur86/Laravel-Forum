<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(Topic::class);
    }


 public function replies()
    {
        return $this->hasMany(Reply::class);
    }





}
