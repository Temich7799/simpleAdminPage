<?php

require_once './app/controllers/BaseController.php';

class HomePageController extends BaseController
{
    public function loginPage()
    {
        return $this->sendRenderedTwigPage('login-page_template.html.twig');
    }
}
