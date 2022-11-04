<?php

require_once './app/models/BaseModel.php';

class MainPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('login-page_template.html.twig', ['page_title' => 'Login']);
    }
}
