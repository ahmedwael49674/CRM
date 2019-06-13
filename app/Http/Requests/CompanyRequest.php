<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
      'name'    => 'required|max:190',
      'email'   => 'required|email|unique:companies,email,'.$id,
      'logo'    => 'image|dimensions:min_width=100,min_height=100',
      'website' => 'nullable|url'
    ];
  }
}
