<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;
  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = "users";

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'email', 'name',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * insert new user row.
  */
  public static function insertRow($request)
  {
    $user = new User();
    $user->email = $request->email;
    $user->name = $request->name;
    $user->password = bcrypt($request->password);
    $user->save();
  }

  /**
  * update user row.
  */
  public static function updateRow($request, $id)
  {
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if (!empty($request->password)) {
      $user->password = bcrypt($request->password);
    }
    $user->save();
  }
}
