<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThongTinChung extends Model
{
   public $table ='thongtinchung';
   protected $fillable = ['id', 'flightno', 'day', 'adress', 'phone', 'user_id', 'created_at', 'updated_at'];
}
