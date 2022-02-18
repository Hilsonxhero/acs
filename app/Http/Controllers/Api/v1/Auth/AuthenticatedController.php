<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{

    public function store(Request $request)
    {
        ApiService::Validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $http = new \GuzzleHttp\Client;

        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->email,
                    'password' => $request->password,
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                ApiService::_throw("Invalid Request. Please enter a username or a password.", $e->getCode());
            } else if ($e->getCode() === 401) {
                ApiService::_throw("Your credentials are incorrect. Please try again", $e->getCode());
            }

            ApiService::_throw("Something went wrong on the server.", $e->getCode());
        }
    }

    public function refresh(Request $request)
    {
        ApiService::Validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        $http = new \GuzzleHttp\Client;

        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $request->refresh_token,
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'scope' => '',
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                ApiService::_throw("Invalid Request. Please enter a username or a password.", $e->getCode());
            } else if ($e->getCode() === 401) {
                ApiService::_throw("Your credentials are incorrect. Please try again", $e->getCode());
            }

            ApiService::_throw("Something went wrong on the server.", $e->getCode());
        }
    }

    public function show(Request $request)
    {
        // $user = Auth::user();
        $user =  new UserResource(Auth::user());
        // $role = $user->roles()->first()->name;
        // $user->load('roles:name');

        ApiService::_success($user);
    }

    public function logout(Request $request)
    {

        Auth::user()->token()->revoke();

        ApiService::_success("Successfully logged out");
    }
}
