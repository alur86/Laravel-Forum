<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
   



protected $fillable = [
      'title' 
  ];



 public $timestamps = true;	
    
 protected $table = 'topics';
 

  public function user()
    {
        return $this->belongsTo(User::class);
    }



 public function threads()
    {
        return $this->hasMany(Thread::class);
    }




}
