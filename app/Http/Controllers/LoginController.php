<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function loginForm()
    {
        if (!\request()->session()->has('token')) {
            $client = new Client();
            $options = [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => ' application/json',
                ],
                'json' => [
                    "client_key" => "android123",
                    "secret_key" => "android123"
                ]
            ];
            $responseService = $client->request('POST', env('GATEWAY') . '/Credentials/login', $options);
            $response = json_decode($responseService->getBody()->getContents(), false);

            if ($response->success) {
                Session::put('token', $response->data->secret_key);
            }
        }

        if (\request()->session()->has('Authorization')){
            return redirect('/');
        }

        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
            $client = new Client();
            $options = [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => ' application/json',
                    'Authorization' => 'Bearer ' . \session()->get('token')
                ],
                'json' => [
                    'employee_email' => $request->email,
                    'employee_password' => $request->password
                ]
            ];
            $responseService = $client->request('POST', env('GATEWAY') . '/Employee/login', $options);
            $response = json_decode($responseService->getBody()->getContents(), false);

        if ($response->success) {
            Session::put('Authorization', $response->data->secret_key);
            return redirect('/');
        }

        return $request->all();
    }

    public function logout()
    {
        \request()->session()->invalidate();
        return redirect('/login');
    }
}
