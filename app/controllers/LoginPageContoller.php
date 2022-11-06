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
                $this->notifyLogged();
                return true;
            } else return false;
        } else return false;
    }

    protected function saveSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        setcookie('sid', session_id(), time() + 180);
        return $this->makeQueryToSQL("UPDATE `users` SET `session_id`='" . session_id() . "',`status`='online' WHERE `username` = '" . $this->username . "'");
    }

    private function notifyLogged()
    {
        [$email_address] = mysqli_fetch_row($this->makeQueryToSQL("SELECT `email` FROM `users` WHERE `username` = '" . $this->username . "'"));
        if ($email_address !== null || $email_address !== false) {
            mail($email_address, 'Your account was logged in', 'Details');
        }
    }
}
