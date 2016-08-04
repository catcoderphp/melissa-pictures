<?php
/**
 * Created by PhpStorm.
 * User: catcoder
 * Date: 4/08/16
 * Time: 04:41 PM
 */

namespace Catcoder\Helpers;
use Illuminate\Support\Facades\Auth as CoreAuth;


class Auth
{
    public function createAccessToken($username,$password) {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (CoreAuth::once($credentials)) {
            return CoreAuth::user()->id;
        } else {
            return false;
        }
    }
}