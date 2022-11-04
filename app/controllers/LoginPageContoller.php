<?php

require_once './app/controllers/BaseController.php';
class LoginPageContoller extends BaseController
{

    private $username;
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function isUserExist()
    {
        $query = mysqli_fetch_row($this->makeQueryToSQL("SELECT `password` FROM `users` WHERE `username` = '" . $this->username . "'"));
        if ($query !== null) {
            $user_password = $query[0];
            if ($user_password === $this->password) return true;
            else return false;
        } else return false;
    }
}
