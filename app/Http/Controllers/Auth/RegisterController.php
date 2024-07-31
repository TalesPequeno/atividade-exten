<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'], // Adicionei o campo surname
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company_id' => $data['company_id'], // Adicionei o campo company_id
            'profile_photo' => $data['profile_photo'], // Adicionei o campo profile_photo
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        $validator->after(function ($validator) use ($request) {
            $email = $request->input('email');
            $password = $request->input('password');
            $password_confirmation = $request->input('password_confirmation');

            if (User::where('email', $email)->exists()) {
                $validator->errors()->add('custom_email_error', 'O e-mail já está em uso.');
            }

            if (strlen($password) < 8) {
                $validator->errors()->add('custom_password_error', 'A senha deve conter no mínimo 8 caracteres.');
                return;
            }

            if ($password !== $password_confirmation) {
                $validator->errors()->add('custom_password_confirm_error', 'As senhas não conferem.');
                return;
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the user and log them in
        $this->create($request->all());
        return redirect($this->redirectTo);
    }
}
