<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  public $table ='admin';
  protected $fillable = [
      'hoten', 'email', 'password','sdt'
  ];
}
