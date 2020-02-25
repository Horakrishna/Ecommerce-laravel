<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['coustomer_id','shiping_id','order_total','order_status'];
}
