<?php

require_once 'BaseModel.php';

class MainPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('admin_sessions-page_template.html.twig', ['page_title' => 'Login']);
    }
}
