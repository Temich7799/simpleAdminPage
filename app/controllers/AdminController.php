<?php

require_once 'BaseController.php';

class AdminController extends LoginPageContoller
{
    public function deleteUser(string $username)
    {
        $this->makeQueryToSQL("DELETE FROM `users` WHERE `username`= '" . $username . "'");
    }
}
