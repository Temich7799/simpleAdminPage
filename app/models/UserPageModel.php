<?php

require_once 'MainPageModel.php';

class UserPageModel extends MainPageModel
{
    public function renderPage()
    {
        return $this->renderHTML('user_users-page.html.twig', ['page_title' => 'Home']);
    }

    protected function getUsersList()
    {
        return mysqli_fetch_all($this->makeQueryToSQL("SELECT `username`, `status` FROM `users` WHERE 1"));
    }
}
