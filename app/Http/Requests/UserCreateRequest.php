<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
    public function rules(): array
    {
        $userId = $this->route('id');

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
            'role' => 'required|in:user,superadmin',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus terdiri dari minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Jenis kelamin harus Male atau Female.',
            'age.required' => 'Usia wajib diisi.',
            'age.integer' => 'Usia harus berupa angka.',
            'age.min' => 'Usia harus minimal 1 tahun.',
            'birth.required' => 'Tanggal lahir wajib diisi.',
            'birth.date' => 'Format tanggal lahir tidak valid.',
            'address.required' => 'Alamat wajib diisi.',
            'role.required' => 'Role wajib diisi.',
            'role.in' => 'Role User atau Superadmin.',
        ];
    }
}
