<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhSachIn extends Model
{
	public $table ='danhsachin';
	protected $fillable = [ 'firstname','ttc_id', 'lastname', 'birthday', 'country', 'city', 'purpose', 'option1', 'option2', 'option3', 'created_at', 'updated_at'];
   
}
