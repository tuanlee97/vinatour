<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuocGia extends Model
{
public $table ='quocgia';
 protected $fillable = [
     'tenquocgia', 'image'
    ];
}
