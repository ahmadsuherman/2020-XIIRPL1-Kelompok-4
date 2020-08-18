<?php

namespace App;
use App\Item;
use App\User;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
	//use SoftDeletes;

   //protected $dates = ['deleted_at'];
   protected $fillable=['id_student','id_item','total_borrow','status'];

   // public function students()
   // {
   // 	return $this->belongsTo(Student::class);
   // }

   // public function items()
   // {
   // 		return $this->belongsToMany(Item::class);
   // }



   
}
