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
            'category_id'=>'required',
            'first_name' =>'required|string| max:255',
            'last_name' =>'required |string | max:255',

            'gender' => 'required',
            'email' => 'required | string | email | max:255',
            'tel1' => 'required | numeric | digits_between:1,5',
            'tel2' =>'required | numeric | digits_between:1,5',
            'tel3' => 'required | numeric | digits_between:1,5' ,
            'tell' => 'required|numeric ',
            'address' => 'required | max:255' ,
            'detail' => 'required | max:120',
        ];
    }

public function validationData()
{ 
     $this->merge([ 
       'tell' => $this->input('tel1') . $this->input('tel2') . $this->input('tel3'),
    ]);

     return parent::validationData();

 }


    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',

            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',

            'tel1.numeric' => '電話番号は5桁までの数字で入力してください',
            'tel2.numeric' => '電話番号は5桁までの数字で入力してください',
            'tel3.numeric' => '電話番号は5桁までの数字で入力してください',

            'tel1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel3.digits_between' => '電話番号は5桁までの数字で入力してください',

            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',

            'address.required' =>'住所を入力してください',
            'category_id.required' =>'問い合わせの種類を選択してください',
            'detail.required' =>'問い合わせの内容を入力してください',
            'detail.max' =>'お問合せ内容は120文字以内で入力してください',

        ];
    }
}



