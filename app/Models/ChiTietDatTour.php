<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDatTour extends Model
{
   public $table ='chitietdattour';
protected $fillable = ['dondattour_id','giatien','loai','ten','sdt','diachi','gioitinh','quocgia','passport'];
   
}
