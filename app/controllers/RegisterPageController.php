<?php

require_once 'BaseController.php';

class RegisterPageController extends BaseController
{
    public function registerUser(string $email, string $username, string $password, string  $role = 'user')
    {
        return $this->makeQueryToSQL("INSERT INTO `users` (`email`, `username`, `password`, `role`) VALUES ('" . $email . "', '" . $username . "', '" . $password . "', '" . $role . "')");
    }
}
