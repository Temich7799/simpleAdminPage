<?php

require_once 'BaseModel.php';

class ResetPasswordPageModel extends BaseModel
{
    public function renderPage()
    {
        return $this->twig->render('reset-password-page.html.twig', ['page_title' => 'Reset password']);
    }
}
