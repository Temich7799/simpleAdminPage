<?php

require_once 'MainPageModel.php';

class SessionsPageModel extends MainPageModel
{
    public function renderPage()
    {
        if ($this->is_admin === true) return $this->renderHTML('admin_sessions-page.html.twig', ['page_title' => 'Sessions']);
        else return $this->renderHTML('message-page.html.twig', ['message' => 'You dont have permissions to watch this page :/']);
    }
}
