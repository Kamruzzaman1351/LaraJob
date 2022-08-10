<?php

namespace App\Http\Requests\Apply;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplyJobRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required | email',
            'hear_about' => 'required',
            'eng_profic' => 'required | in:"Native","Fluent","Proficient"',
            'good_fit' => 'required',
            'life_goal' => 'required',
            'ideal_job' => 'required',
            'hardest_thing' => 'required',
            'team_member' => 'required',
            'working' => 'required | in:"No","Yes"',
            'current_salary' => 'required',
            'expected_salary' => 'required',
            'about_you' => 'required',
            'file_cv' => 'required | mimes:doc,pdf,docx,odt | max:2024',
        ];
    }

    public function messages() {
        return [
            'hear_about.required' => 'This field is required.',
            'eng_profic.required' => 'This field is required.',
            'good_fit.required' => 'This field is required.',
            'life_goal.required' => 'This field is required.',
            'ideal_job.required' => 'This field is required.',
            'hardest_thing.required' => 'This field is required.',
            'team_member.required' => 'This field is required.',
            'working.required' => 'This field is required.',
            'current_salary.required' => 'This field is required.',
            'expected_salary.required' => 'This field is required.',
            'about_you.required' => 'This field is required.',
            'file_cv.required' => 'This field is required.', 
        ];
    }
}
