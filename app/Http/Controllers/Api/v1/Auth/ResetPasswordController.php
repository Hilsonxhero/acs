<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function store(Request $request)
    {

        ApiService::Validator($request->all(), [
            'email' =>  ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );


        return $status == Password::RESET_LINK_SENT
            ?  ApiService::_success("Please check your email")
            :  ApiService::_throw("Invalid email");
    }
}
