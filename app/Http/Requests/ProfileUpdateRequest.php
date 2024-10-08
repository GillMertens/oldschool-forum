<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'username' => ['string', 'max:255', 'unique:users,username,' . $this->user()->id],
            'email' => ['string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $this->user()->id],
            'img' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:3072'],
            'bio' => ['nullable', 'string', 'max:500'],
            'dob' => ['nullable', 'date', 'before:today'],
        ];
    }
}
