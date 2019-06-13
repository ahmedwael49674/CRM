<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    $id   = (int) $this->request->has('id')?$this->request->all()['id']:'';

    return [
      'first_name'  => 'required|max:20',
      'last_name'   => 'required|max:20',
      'email'       => 'required|email|unique:employees,email,'.$id,
      'phone'       => 'required|unique:employees,phone,'.$id,
      'company_id'  => 'required|exists:companies,id'
    ];
  }
}
