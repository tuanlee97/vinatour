<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTour extends Model
{
    public $table ='loaitour';
    protected $fillable = [
      'tenloai','songay','sodem','type'
    ];
}
