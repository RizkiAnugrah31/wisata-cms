<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    //

         public function authenticate(Request $request)
        {
             $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            ]);

        }


        public function loginForm(Request $request)
        {
            $client = new \GuzzleHttp\Client();;
            $request = $client->get('http://localhost:8001/LoginController/get/'.$request);
            $response = $request->getBody()->getContents();
            
            return $data = json_decode($response, true);
        }


        public function doLogin($Request $request)
        {
            $client = new Client();
            $option = [
                'header'=> [
                'Accept'=> 'application/json',
              'Content-Type' => 'application/json',
            ],
            'json'=> $request->all ()
        };
            $responseService= $client->request9('GET', env(''). '/', $option)
            $response
            




    