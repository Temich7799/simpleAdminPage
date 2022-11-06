<?php

require_once 'BaseModel.php';

class MainPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('user_users-page.html.twig', [
            'page_title' => 'Users',
            'data' => $this->getUsersList()
        ]);
    }

    protected function getUsersList()
    {
        return mysqli_fetch_all($this->makeQueryToSQL("SELECT `username`, `status` FROM `users` WHERE 1"));
    }
}
