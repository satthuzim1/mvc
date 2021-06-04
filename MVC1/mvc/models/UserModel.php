<?php

class UserModel extends connectDB
{


    public function userLogin($username, $password): bool
    {
        $hash_password = hash('sha256', $password);
        $sql = "SELECT id, username, password, img FROM accounts WHERE username = '$username' and password = '$hash_password'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!empty($row)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['img'] = $row['img'];
            return true;
        } else {
            return false;
        }
    }

    public function getUserList(): array
    {
        $sql = "SELECT * FROM accounts";
        $result = mysqli_query($this->con, $sql);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function checkRegistration($username): bool
    {
        $sql = "SELECT username FROM accounts WHERE username = '$username'";
        $result = mysqli_query($this->con, $sql);
        $count = $result->num_rows;
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function userRegistration($username, $password): bool
    {
        $hash_password = hash('sha256', $password);
        $sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$hash_password')";
        $result = mysqli_query($this->con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id)
    {
        $sql = "SELECT username FROM accounts WHERE id ='$id'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row['username'] == 'admin') {
            return false;
        } else {
            $sql = "DELETE FROM accounts where id = '$id'";
            mysqli_query($this->con, $sql);
            return true;
        }
    }

    public function getUserDetail($id)
    {
        $sql = "SELECT id, username, password FROM accounts WHERE id ='$id'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function updateUser($id, $password, $imgName)
    {
        $hash_password = hash('sha256', $password);
        //lay ra username
        $sql = "SELECT id FROM accounts WHERE id ='$id'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //query update
        $sql = "UPDATE accounts SET password='$hash_password' , img= '$imgName'WHERE id = '$id'";
        $result = mysqli_query($this->con, $sql);
        if ($result > 0) {
            return array('id' => $row['id'], 'stt' => true);
        } else {
            return false;
        }


    }

}
