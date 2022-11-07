<?php

require_once 'BaseController.php';

class RegisterPageController extends BaseController
{
    public function registerUser(string $email, string $username, string $password, string  $role = 'user')
    {
        $result = [
            'status' => false,
            'content' => ''
        ];

        if ($this->isEmailExist($email) == false) {

            if ($this->makeQueryToSQL("INSERT INTO `users` (`email`, `username`, `password`, `role`) VALUES ('" . $email . "', '" . $username . "', '" . $password . "', '" . $role . "')") == false) {
                $result['content'] = 'An error has occurred, please try again';
            } else {
                $result['status'] = true;
                $this->notifyRegistered($email);
            }
        } else {
            $result['content'] = 'This email already exists';
        }

        return $result;
    }

    public function isEmailExist(string $email)
    {
        if (mysqli_fetch_row($this->makeQueryToSQL("SELECT `email` FROM `users` WHERE `email` = '" . $email . "'")) == null) return false;
        else return true;
    }

    public function updatePassword(string $email)
    {
        $password = $this->generatePassword();

        if ($this->makeQueryToSQL("UPDATE `users` SET `password`='" . $password . "' WHERE `email` = '" . $email . "'")) {
            $this->sendPassword($email, $password);
            return $password;
        }
    }

    private function generatePassword()
    {
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;

        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < 8; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    private function notifyRegistered(string $email)
    {
        mail($email, 'Your account was succesfully registered!', 'Details');
    }

    private function sendPassword(string $email, string $password)
    {
        mail($email, 'Your password has been reset', 'New password: ' . $password);
    }
}
