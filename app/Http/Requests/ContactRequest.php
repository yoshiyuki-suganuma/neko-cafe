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
        //権限チェックをするかどうか
        //ユーザーごとに権限を割り当て、利用できるサービスを制限するかどうか
        //その場合はfalseにする
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
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],
            //ハイフン有無、両対応
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string', 'max:2000'],
        ];
    }

    // エラーメッセージを任意に設定
    public function attributes() {
        
        return [
        'body' => '本文',
        ];
    }

    public function messages() {
        //連想配列のキーには属性名、ルール名とすれば個別に設定できる
        return [
        'phone.regex' => ':attributeを正しく入力してください',
        ];
    }

}
