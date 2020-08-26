<?php

namespace App;
use App\Item;
use App\User;

use Illuminate\Database\Eloquent\Model;


class Borrow extends Model
{

   protected $fillable=['id_student','id_item','total_borrow','status','created_at','updated_at'];

   // public function students()
   // {
   // 	return $this->belongsTo(Student::class);
   // }

   // public function items()
   // {
   // 		return $this->belongsToMany(Item::class);
   // }



   
}
