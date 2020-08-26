<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['full_name','nis','user_id','class','gender'];

 //    public function borrows()
 //    {
 //    	return $this->belongsToMany('Borrow');
 //    }

 //   	public function users()
	// {
	// 	return $this->belongsToMany('User');
	// }    
}
