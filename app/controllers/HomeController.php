<?php

require './app/controllers/BaseController.php';

class HomeController extends BaseController
{
    public function home()
    {
        return $this->sendRenderedTwigPage('home_template.html.twig', [
            'name' => 'Artem',
            'occupation' => 'Developer'
        ]);
    }
}
