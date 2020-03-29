<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderConfirmRequest extends FormRequest
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
            'name'=>'required|min:1|max:100',
            'phone'=>'required|min:1|max:30',
            'town'=>'required|min:1|max:30',
            'car_manufacturer'=>'required|min:3|max:30',
            'car_model'=>'required|min:3|max:30',
            'year_manufacture'=>'required|min:4|max:5',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Введите имя',
            'name.min'=>'Имя должно быть минимум из 1 символа',
            'name.max'=>'Имя может быть максимум из 100 символа',
            'phone.required'=>'Введите телефон',
            'phone.min'=>'Телефон должен быть минимум из 1 символа',
            'phone.max'=>'Телефон может быть максимум из 30 символа',
            'town.required'=>'Введите город',
            'town.min'=>'Город должно быть минимум из 1 символа',
            'town.max'=>'Город может быть максимум из 30 символа',
            'car_manufacturer.required'=>'Введите марку авто',
            'car_manufacturer.min'=>'Марка авто должна быть минимум из 1 символа',
            'car_manufacturer.max'=>'Марка авто может быть максимум из 30 символа',
            'car_model.required'=>'Введите модель авто',
            'car_model.min'=>'Модель авто должна быть минимум из 1 символа',
            'car_model.max'=>'Модель авто может быть максимум из 30 символа',
            'year_manufacture.required'=>'Введите год выпуска авто',
            'year_manufacture.min'=>'Год выпуска должен быть минимум из 1 символа',
            'year_manufacture.max'=>'Год выпуска может быть максимум из 30 символа',
        ];
    }
}
