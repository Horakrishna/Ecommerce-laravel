<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coustomer extends Model
{
     protected $fillable =['first_name','last_name','user_email','password','phone','address'];
}
