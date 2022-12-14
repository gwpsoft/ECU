<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateArticleListRequest extends Request
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
          'code' => 'required',
          'short_name' => 'required',
          'long_name' => 'required',
          'description' => 'required',
          'size' => 'required',
          'unit' => 'required|Integer',
          'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Het codeveld is verplicht',
            'short_name.required' => 'Het korte naamveld is verplicht',
            'long_name.required' => 'Het lange naamveld is verplicht',
            'description.required' => 'Het beschrijvingsveld is verplicht',
            'size.required' => 'Het veld grootte is verplicht',
            'unit.required' => 'Het eenheidsveld is verplicht',
            'type.required' => 'Het typeveld is verplicht',
        ];
    }
}
