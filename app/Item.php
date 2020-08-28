<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model{
	
	use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['item_name','total_item','stock_item','licensor','created_at','updated_at'];
}
