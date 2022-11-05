<?php

require_once 'BaseModel.php';

class RegisterPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('register-page_template.html.twig', ['page_title' => 'Sign Up']);
    }
}
