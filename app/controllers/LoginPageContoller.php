<?php

require_once 'BaseController.php';
class LoginPageContoller extends BaseController
{

    private $username;
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser()
    {
        $query = mysqli_fetch_row($this->makeQueryToSQL("SELECT `password` FROM `users` WHERE `username` = '" . $this->username . "'"));

        if ($query !== null) {
            $user_password = $query[0];
            if ($user_password === $this->password) {
                $this->saveSession();
                return true;
            } else return false;
        } else return false;
    }
    protected function saveSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        setcookie('sid', session_id(), time() + 900);
        return $this->makeQueryToSQL("UPDATE `users` SET `session_id`='" . session_id() . "',`status`='online' WHERE `username` = '" . $this->username . "'");
    }
}
