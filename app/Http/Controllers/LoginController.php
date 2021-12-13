<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    
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
            $request = $client->get('http://localhost:8001/Employee/login/'.$option);
            $response = $request->getBody()->getContents();
            
            return $data = json_decode($response, true);
        }

        
        public function doLogin(Request $request) 
        {
            $client = new \GuzzleHttp\Client();;
            $request = $client->post('http://localhost:8001/Employee/login/'.$option);
            $response = $request->getBody()->getContents();
            
            return $data = json_decode($response, true);
        }
    

}

        
    









    