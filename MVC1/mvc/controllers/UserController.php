<?php


class UserController extends BaseController
{

    public static function loginSubmit()
    {
        $username = strval($_POST['username']);
        $password = strval($_POST['password']);
        if ($username && $password) {
            $var = self::model('UserModel')->userLogin($username, $password);
            if ($var == true) {
                return header('Location: http://localhost/mvc1/UserDetailController/getUserList');
            } else {
                return self::view('login', ['err' => 'Invalid username or password!!']);
            }
        }
    }

    public static function signupSubmit()
    {
        $username = strval($_POST['username']);
        $password = strval($_POST['password']);
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        $password_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $password);
        if ($username && $password) {
            if (($username_check && $password_check) > 0) {
                $stt = self::model('UserModel')->checkRegistration($username);
                if ($stt == 1) {
                    $var = self::model('UserModel')->userRegistration($username, $password);
                    if ($var) {
                        self::view('Register', ['inform' => 'Create new account successful!!']);
                    } else {
                        self::view('Register', ['inform' => 'Insert error, DB or model fail!!']);
                    }
                } else {
                    self::view('Register', ['inform' => 'Username not available!!']);
                }
            } else {
                self::view('Register', ['inform' => 'Username & password not include special character!!']);
            }
        } else {
            self::view('Register', ['inform' => 'pls insert username & password!!']);
        }
    }
}
