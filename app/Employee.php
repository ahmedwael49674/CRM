<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'first_name', 'last_name', 'email', 'company_id', 'phone'
  ];

  /**
  * Get the company that owns the employee.
 */
 public function company()
 {
   return $this->belongsTo('App\Company');
 }

}
