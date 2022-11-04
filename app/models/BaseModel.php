<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseModel
{

    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('app/views/templates');
        $this->twig = new Environment($loader);
    }

    protected function renderHTML($template_file_name, $context = [])
    {
        return $this->twig->render($template_file_name, $context);
    }
}
