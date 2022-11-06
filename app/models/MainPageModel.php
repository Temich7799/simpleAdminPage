<?php

require_once 'BaseModel.php';

class MainPageModel extends BaseModel
{
    protected $is_admin = false;

    public function __construct()
    {
        parent::__construct();

        $this->is_admin = $this->checkForAdmin();
    }

    public function renderPage()
    {
        if ($this->is_admin === true) return $this->renderHTML('admin_main-page.html.twig', ['page_title' => 'Welcome!']);
        else return $this->renderHTML('user_main-page.html.twig', ['page_title' => 'Welcome!']);
    }

    protected function checkForAdmin()
    {
        if ($this->is_user_logged === true) {
            $result = mysqli_fetch_row($this->makeQueryToSQL("SELECT `role` FROM `users` WHERE `session_id` = '" . session_id() . "'"))[0];
            if ($result === 'admin') return true;
            else return false;
        }
        return false;
    }
}
