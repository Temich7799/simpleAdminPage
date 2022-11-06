<?php

require_once 'BaseModel.php';

class UserPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('user_users-page.html.twig', ['page_title' => 'Home']);
    }
}
