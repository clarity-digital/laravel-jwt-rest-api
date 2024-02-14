<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SendPasswordResetLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
        ];
    }
}
