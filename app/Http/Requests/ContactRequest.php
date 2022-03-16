<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => ['required','max:255'],
            'gender' => 'required',
            'email' => ['required','email:strict,dns','max:255'],
            'postcode' =>[ 'required','max:8',new ZipCodeRule()],
            'address' => ['required','max:255'],
            'opinion' => ['required','max:120']
        ];
    }
}
