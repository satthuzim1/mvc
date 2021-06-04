<?php

class UserDetailController extends BaseController
{

    public static function getUserList()
    {
        return self::view('UserDetail', ['row' => self::model('UserModel')->getUserList()]);
    }

    public static function deleteUser($id)
    {
        if ($_SESSION['username'] == 'admin') {
            $var = self::model('UserModel')->deleteUser($id);
            if ($var == true) {
                return header("Location: http://localhost/mvc1/UserDetailController/getUserList");
            } else {
                echo "you can't delete admin account";
            }
        } else {
            echo 'Contact with administrator';
        }

    }

    public static function exportUser()
    {
        self::view('ExportPersonal');
    }

    public static function exportList()
    {
        self::view('ExportList', ['row' => self::model('UserModel')->getUserList()]);
    }

}

?>

