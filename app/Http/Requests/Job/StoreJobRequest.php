<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required | min:10 | max:200',
            'company' => 'required | min:3 | max:100',
            'location' => 'required | min:3 | max:200',
            'website' => 'required',
            'email' => 'required | email',
            'description' => 'required | min:10 | max:300',
            'tags' => 'required'
        ];
    }

    public function messages() {
        return [

        ];
    }
}
