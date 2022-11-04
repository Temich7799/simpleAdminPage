<?php

require_once './app/models/BaseModel.php';

class UserPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('user-page_template.html.twig', ['page_title' => 'Home']);
    }
}
