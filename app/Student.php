<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{	
	// use softDeletes;
	// protected $dates = ['deleted_at'];
	
    protected $fillable= ['full_name','nis','user_id','class','gender'];

 //    public function borrows()
 //    {
 //    	return $this->belongsToMany('Borrow');
 //    }

 //   	public function users()
	// {
	// 	return $this->belongsToMany('User');
	// }    
}
