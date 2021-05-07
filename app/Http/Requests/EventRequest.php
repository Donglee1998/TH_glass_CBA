<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'number_of_participants' => 'required|integer:500',
            'start_day' => 'required',
            'hidden'=>'required',
            'public_time'=>'required',
            'status'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'hidden.required' => 'Chưa có hình đó bạn ơi',
        ];
    }
}
