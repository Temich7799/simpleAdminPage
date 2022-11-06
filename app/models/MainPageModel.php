<?php

require_once 'BaseModel.php';

class MainPageModel extends BaseModel
{

    public function renderPage()
    {
        return $this->renderHTML('user_main-page.html.twig', ['page_title' => 'Welcome!']);
    }
}
