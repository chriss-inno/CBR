<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientRequest extends Request
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
            //
            'file_number' => 'required|unique:clients',
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
            'examiner_title' => 'required',
            'examiner_name' => 'required',
            'status' => 'required',
        ];
    }

}
