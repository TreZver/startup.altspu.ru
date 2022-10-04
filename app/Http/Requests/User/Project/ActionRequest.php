<?php

namespace App\Http\Requests\User\Project;

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
            'name'               => 'required|string' ,
            'link'               => 'nullable|string|url' ,
            'thematic_direction' => 'required|numeric|exists:App\Models\ThematicDirection,id' ,
            'exec_fio'           => 'nullable|string' ,
            'exec_dolj'          => 'nullable|string' ,
            'file'               => 'sometimes|required|file|mimes:pptx,odp,pdf' ,
        ];
    }
}
