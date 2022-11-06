<?php

require_once 'BaseModel.php';

class MainPageModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->is_admin = $this->checkForAdmin();
    }

    public function renderPage()
    {
        if ($this->is_admin === true) return $this->renderHTML('admin_main-page.html.twig', ['session_id' => session_id(), 'page_title' => 'Welcome, Admin!']);
        else return $this->renderHTML('user_main-page.html.twig', ['session_id' => session_id(), 'page_title' => 'Welcome, User!']);
    }
}
