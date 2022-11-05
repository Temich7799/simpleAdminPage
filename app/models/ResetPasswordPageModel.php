<?php

require_once 'BaseModel.php';

class ResetPasswordPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('reset_password-page_template.html.twig', ['page_title' => 'Reset password']);
    }
}
