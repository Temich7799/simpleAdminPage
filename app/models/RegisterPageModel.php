<?php

require_once 'BaseModel.php';

class RegisterPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->twig->render('register-page.html.twig', ['page_title' => 'Sign Up']);
    }
}
