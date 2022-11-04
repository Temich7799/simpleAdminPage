<?php

require_once './app/models/BaseModel.php';

class ResetPasswordPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->renderHTML('reset_password-page_template.html.twig', ['page_title' => 'Reset password']);
    }
}
