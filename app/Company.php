<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
  
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'website', 'email', 'logo'
  ];

  /**
  * Get the companys of company.
  */
  public function employees()
  {
    return $this->hasMany('App\Employee');
  }

  public function setLogoAttribute($value)
  {
      $this->attributes['logo'] = Storage::disk('public')->putFile('logos', $value);
  }
}
