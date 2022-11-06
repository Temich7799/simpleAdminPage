<?php

require_once 'BaseModel.php';

class AdminSessionsPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('admin_sessions-page.html.twig', ['page_title' => 'Sessions']);
    }
}
