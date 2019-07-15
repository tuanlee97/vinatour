<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $table ='notification';
     protected $fillable = [
       'user_id', 'noidung','status'
    ];
   
}
