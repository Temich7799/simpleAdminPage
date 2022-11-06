<?php

require_once 'MainPageModel.php';

class SessionsPageModel extends MainPageModel
{
    public function renderPage()
    {
        if ($this->is_admin === true) return $this->renderHTML('admin_sessions-page.html.twig', [
            'session_id' => session_id(),
            'data' => $this->getSessionsList()
        ]);
        else return $this->renderHTML('message-page.html.twig', ['message' => 'You dont have permissions to watch this page :/']);
    }

    protected function getSessionsList()
    {
        return mysqli_fetch_all($this->makeQueryToSQL("SELECT `username`, `session_id`, `status` FROM `users` WHERE 1"));
    }
}
