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

    private function notifyRegistered(string $email)
    {
        mail($email, 'Your account was succesfully registered!', 'Details');
    }
}
