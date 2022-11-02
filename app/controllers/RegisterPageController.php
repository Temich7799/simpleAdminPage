<?php

require_once './app/controllers/BaseController.php';

class RegisterPageController extends BaseController
{
    public function registerPage()
    {
        return $this->sendRenderedTwigPage('register-page_template.html.twig', ['page_title' => 'Sign Up']);
    }
}
