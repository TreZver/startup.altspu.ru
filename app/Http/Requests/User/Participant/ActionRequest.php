<?php

namespace App\Http\Requests\User\Participant;

use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
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
        return [
         'surname'   => 'required|string' ,
         'name'      => 'required|string' ,
         'patronym'  => 'nullable|string' ,
         'age'       => 'required|numeric',
         'institute' => 'required|string' ,
         'group'     => 'required|string' ,
         'phone'     => 'nullable|string'
        ];
    }
}
