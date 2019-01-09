<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters
{
    
    protected $filters = ['by', 'newest','abc'];


  
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

 
    protected function newest()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('created_at', 'desc');
    }

 
    protected function abc()
    {
         $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('name');

    }
}
