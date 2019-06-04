<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachSan extends Model
{
   public $table ='khachsan';
   protected $fillable = [
     'tenkhachsan', 'gia','noidung','hinhanh','tinh'
    ];
}
