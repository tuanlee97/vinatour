<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietTuChon extends Model
{
    public $table ='chitiettuchon';
    protected $fillable = [
     'tuchon_id', 'lichtrinhngay','diadanh','nhahang','khachsan','tongtienngay'
    ];
}
