<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FurnitureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
            'cost' => 'required|numeric|min:100',
            'stock' => 'required|boolean',
        ];
    }

    /**
     * Получить сообщения валидации.
     */
    public function messages()
    {
        return [
            'name.required' => 'Имя(name) является обязательным полем.',
            'name.string' => 'Имя(name) должно представлять собой строку.',
            'name.max' => 'Имя(name) не должно превышать 50 символов.',
            'description.string' => 'Описание(description) должно представлять собой строку.',
            'cost.min' => 'Стоимость(cost) должна быть не менее 100.',
            'cost.required' => 'Стоимость(cost) является обязательным полем.',
            'cost.numeric' => 'Стоимость(cost) должно быть числом.',
            'stock.required' => 'Наличие на складе(stock) является обязательным полем.',
            'stock.boolean' => 'Наличие на складе(stock) должно представлять собой логическое значение.',
        ];
    }
}
