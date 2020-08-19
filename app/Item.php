<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model

//tugas PBO
//ini modelnya
{
    protected $fillable = ['item_name','total_item','stock_item','licensor','created_at','updated_at'];
}
