<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
   public $table ='tour';

     protected $fillable = [
       'in_out', 'tentour','songay','sodem','diemxuatphat','noidung','hinhanh',
    ];
    public function tinhs(){
      return $this->belongsToMany('App\Models\Tinh');
    }
    public function diadanhs(){
      return $this->belongsToMany('App\Models\DiaDanh');
    }
    public function nhahangs(){
      return $this->belongsToMany('App\Models\NhaHang');
    }
    public function khachsans(){
      return $this->belongsToMany('App\Models\KhachSan');
    }

}
