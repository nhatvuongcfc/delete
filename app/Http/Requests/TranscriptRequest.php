<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranscriptRequest extends FormRequest
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
            'ten_mon_hoc'=>'required|unique:transcripts|min:3',
            'email'=>'required|'
        ];
        
    }
    public function messages()
    {  
        return [
            'ten_mon_hoc.unique' => 'Tên môn học đã tồn tại',
            'ten_mon_hoc.required' => 'Vui lòng nhập dữ liệu',
            'ten_mon_hoc.min' => 'Tên môn học quá ngắn',
        ];
    }
}
