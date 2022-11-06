<?php

require_once 'BaseController.php';
class LoginPageContoller extends BaseController
{
    private $username;
    private $password;

    protected $is_user_logged = false;
    protected $is_admin = false;

    public function __construct()
    {
        if ($this->isSessionActually() === true) {
            $this->is_user_logged = true;
            $this->saveSession();
        }
    }

    public function loginUser(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;

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

    public function logOutUser(string $session_id)
    {
        $this->makeQueryToSQL("UPDATE `users` SET `session_id`='NULL',`status`='offline' WHERE `session_id` = '" . $session_id . "'");
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

    protected function isSessionActually()
    {
        if (isset($_COOKIE['sid'])) {
            $result =  mysqli_fetch_row($this->makeQueryToSQL("SELECT `session_id` FROM `users` WHERE `session_id` = '" . $_COOKIE['sid'] . "'"));
            if ($result === null || $result === false) return false;
            else return true;
        } else return false;
    }

    protected function checkForAdmin()
    {
        if ($this->is_user_logged === true) {
            $result = mysqli_fetch_row($this->makeQueryToSQL("SELECT `role` FROM `users` WHERE `session_id` = '" . session_id() . "'"))[0];
            if ($result === 'admin') return true;
            else return false;
        }
        return false;
    }
}
