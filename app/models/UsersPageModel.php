<?php

require_once 'MainPageModel.php';

class UsersPageModel extends MainPageModel
{
    public function renderPage()
    {
        if ($this->is_admin === true) return $this->renderHTML('admin_users-page.html.twig', [
            'session_id' => session_id(),
            'data' => $this->getUsersList()
        ]);
        else return $this->renderHTML('user_users-page.html.twig', [
            'session_id' => session_id(),
            'data' => $this->getUsersList()
        ]);
    }

    protected function getUsersList()
    {
        if ($this->is_admin === false) return mysqli_fetch_all($this->makeQueryToSQL("SELECT `username`, `status` FROM `users` WHERE 1"));
        else return mysqli_fetch_all($this->makeQueryToSQL("SELECT `email`, `username`, `role`,`status` FROM `users` WHERE 1"));
    }
}
