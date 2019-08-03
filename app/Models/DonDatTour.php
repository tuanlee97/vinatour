<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonDatTour extends Model
{
   public $table ='dondattour';
    protected $fillable = [
     'id', 'tour_id','user_id','songuoilon','sotreem','soembe','tongtien','status','thanhtoan'
    ];
  
}
