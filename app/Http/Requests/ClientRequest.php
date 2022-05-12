<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'topname'=>'required',
            'undername'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'postcode'=>'required',
            'address'=>'required',
            'opinion'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'topname.required' => '名前を入力してください',
            'undername.required' => '名前を入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください'
        ];
    }
}
