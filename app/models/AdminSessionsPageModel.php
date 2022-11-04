<?php

require_once './app/models/BaseModel.php';

class AdminSessionsPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('admin_sessions-page_template.html.twig', ['page_title' => 'Sessions']);
    }
}
