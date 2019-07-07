<?php

// SocialFacebookAccount.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class SocialFacebookAccount extends Model
{
  protected $fillable = ['id','user_id' ,'provider_user_id', 'provider'];
  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
