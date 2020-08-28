<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licensor extends Model
{
	use SoftDeletes;
     protected $fillable = ['name','phone_number','address','created_at','updated_at'];
     protected $dates = ['deleted_at'];
}
