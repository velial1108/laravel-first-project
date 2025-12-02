<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Всегда менять на true!!
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //Перенесли валидацию с контроллера update function
        return [
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'likes' => '',
            'category' => '',
            'tags' => '',
            //Задание конкретного атрибута из приходящего объекта которому можно задать правила
            'tags.*.title' => '',
        ];
    }
}
