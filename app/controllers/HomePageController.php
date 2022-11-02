<?php

require './app/controllers/BaseController.php';

class HomePageController extends BaseController
{
    public function loginPage()
    {
        return $this->sendRenderedTwigPage('login_page_template.html.twig');
    }
}
