<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        auth()->login($user);

        return redirect()->route('welcome');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required',
        ]);

         // Проверка reCAPTCHA
    $client = new Client();
    $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
        'form_params' => [
            'secret' => '6LcjLHwqAAAAAJ1KLn__gb-1L6lR23Wxn4o0nQu1',
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ],
    ]);

    $body = json_decode((string) $response->getBody());

    if (!$body->success) {
        return redirect()->back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed.']);
    }
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}