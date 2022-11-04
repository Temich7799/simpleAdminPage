<?php

require_once './app/models/BaseModel.php';

class AdminUsersPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('admin_users-page_template.html.twig', ['page_title' => 'Users']);
    }
}
