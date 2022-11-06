<?php

require_once 'MainPageModel.php';

class UsersPageModel extends MainPageModel
{

    public function renderPage()
    {
        return $this->renderHTML('user_users-page.html.twig', [
            'page_title' => 'Home',
            'data' => $this->getUsersList()
        ]);
    }

    protected function getUsersList()
    {
        return mysqli_fetch_all($this->makeQueryToSQL("SELECT `username`, `status` FROM `users` WHERE 1"));
    }
}
