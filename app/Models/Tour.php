<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
class Tour extends Model
{
   public $table ='tour';
     use Rateable;
     protected $fillable = [
       'in_out', 'tentour','songay','sodem','diemxuatphat','noidung','hinhanh',
    ];
       public function comments(){
      return $this->hasMany('App\Models\BinhLuan');
    }
    
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
public function rating()
{
  return $this->hasMany(Rating::class);
}
}
