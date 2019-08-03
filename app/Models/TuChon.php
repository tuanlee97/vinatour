<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuChon extends Model
{
    public $table ='tuchon';
    protected $fillable = [
     'tour_id', 'user_id','tongtien','status'
    ];
}
