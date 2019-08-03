<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
   public $table ='binhluan';
   protected $fillable = [
     'user_id', 'tour_id','body','status'
    ];
    public function post(){
    	return $this->belongsTo('App\Models\Tour');
    }
       public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
