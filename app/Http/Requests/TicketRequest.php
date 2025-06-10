<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'ticket_type' => 'required|in:technical,billing,product,general,feedback',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Please enter your full name',
            'email.required' => 'Please enter your email',
            'subject.required' => 'Please enter a subject',
            'description.required' => 'Please enter a description',
            'email.email' => 'Please enter a valid email address',
            'ticket_type.required' => 'Please select a ticket type',
        ];
    }
}
