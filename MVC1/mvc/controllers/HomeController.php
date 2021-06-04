<?php

class HomeController extends BaseController
{
    public static function Hello()
    {
        return self::view('home');
    }

    public static function logOut()
    {
        return self::view('logout');
    }

    public static function update()
    {
        return self::view('update');
    }

    public static function Login()
    {
        return self::view('Login');
    }

    public static function Register()
    {
        return self::view('register');
    }


}
