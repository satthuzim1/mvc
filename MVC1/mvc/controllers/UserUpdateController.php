<?php

class UserUpdateController extends BaseController
{

    public static function backToDetail()
    {
        header('Location: https://workhom.000webhostapp.com/UserDetailController/getUserList');
    }

    public static function getInfoUser($id)
    {
        $var = self::model('UserModel')->getUserDetail($id);
        return self::view('Update', [
            'id' => $var['id'],
            'username' => $var['username'],
        ]);
    }

    public static function updateUser()
    {
        $id = (int)$_POST['id'];
        $password = (string)$_POST['password'];
        $password_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $password);
        //lay type img
        $remove_special_character = preg_replace('/[^A-Za-z0-9\-.^]/', '', $_FILES['avatar']['name']);
        $arr[] = array_reverse(explode('.', filter_var(trim($remove_special_character, '.'))));
        if ($id && $password) {
            if ($password_check > 0) {
                if (isset($_FILES['avatar'])) {
                    // Nếu file upload không bị lỗi,
                    // Tức là thuộc tính error > 0
                    if ($_FILES['avatar']['error'] > 0 && S_FILES['avatar']['size'] > 15728640) {
                        echo 'File Upload Bị Lỗi';
                    } else {
                        //update user's img_name
                        $var = self::model('UserModel')->updateUser($id, $password, $id . '.' . $arr[0][0]);
                        if ($var['stt'] == true) {
                            // Upload file
                            move_uploaded_file($_FILES['avatar']['tmp_name'], './image/' . $var['id'] . '.' . $arr[0][0]);
                            return header("Location: https://workhom.000webhostapp.com/UserDetailController/getUserList");
                        } else {
                            echo 'update fail';
                        }
                    }
                } else {
                    echo 'Bạn chưa chọn file upload';
                }
            } else {
                echo 'Password invalid!';
            }
        } else {
            echo 'Pls fulfill all field!';
        }
    }
}