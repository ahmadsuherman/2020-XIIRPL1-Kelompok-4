<?php

namespace App;
use App\Item;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Borrow extends Model
{
	use SoftDeletes;

   protected $dates = ['deleted_at'];
   protected $fillable=['user_id','licensor_id','id_item','total_borrow','status','created_at','updated_at'];

   // public function students()
   // {
   // 	return $this->belongsTo(Student::class);
   // }

   // public function items()
   // {
   // 		return $this->belongsToMany(Item::class);
   // }



   
}
