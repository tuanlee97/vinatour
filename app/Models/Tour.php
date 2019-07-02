<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public $table ='tour';
     protected $fillable = [
        'matour', 'loaitour', 'tentour','songay','sodem','diemxuatphat','noidung','hinhanh'
    ];
}