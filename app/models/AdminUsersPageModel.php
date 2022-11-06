<?php

require_once 'BaseModel.php';

class AdminUsersPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('admin_users-page.html.twig', ['page_title' => 'Users']);
    }
}
