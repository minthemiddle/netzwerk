<?php

namespace App\Http\Requests;

use App\Enums\Priority;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
            'firstname' => 'required|string|max:40',
            'lastname' => 'sometimes|string|max:60',
            'email' => 'sometimes|email|max:80|unique:contacts,email',
            'priority' => ['required', 'integer', new EnumValue(Priority::class, false)],
        ];
    }
}
