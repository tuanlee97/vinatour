<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaHang extends Model
{
    public $table ='nhahang';
    protected $fillable = [
     'tennhahang', 'gia','noidung','hinhanh','tinh'
    ];
}
