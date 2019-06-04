<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaDanh extends Model
{
    public $table ='diadanh';
    protected $fillable = [
     'tendiadanh', 'gia','noidung','hinhanh','tinh'
    ];
}
