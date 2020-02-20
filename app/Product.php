<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['category_id','brand_id','product_name','product_price','producct_quantity','short_dis',	'long_dis',	'product_image'	,'publication_stutus'];
}
