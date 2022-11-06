<?php

require_once 'MainPageModel.php';

class SessionsPageModel extends MainPageModel
{
    public function renderPage()
    {
        return $this->renderHTML('admin_sessions-page.html.twig', ['page_title' => 'Sessions']);
    }
}
