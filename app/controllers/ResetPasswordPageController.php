<?php

require_once './app/controllers/BaseController.php';

class ResetPasswordPageController extends BaseController
{
    public function resetPasswordPage()
    {
        return $this->sendRenderedTwigPage('reset_password-page_template.html.twig', ['page_title' => 'Reset password']);
    }
}
