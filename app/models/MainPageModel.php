<?php

require_once 'BaseModel.php';

class MainPageModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->is_admin = $this->checkForAdmin();
    }

    protected function getUserName()
    {
        if (session_id()) {
            return mysqli_fetch_row($this->makeQueryToSQL("SELECT `username` FROM `users` WHERE `session_id` = '" . session_id() . "'"))[0];
        } else return '';
    }

    public function renderPage()
    {
        if ($this->is_admin === true) return $this->renderHTML('admin_main-page.html.twig', ['session_id' => session_id(), 'page_title' => 'Welcome, ' . $this->getUserName() . '. You are Admin!']);
        else return $this->renderHTML('user_main-page.html.twig', ['session_id' => session_id(), 'page_title' => 'Welcome, ' . $this->getUserName() . '. You just a user..']);
    }
}
