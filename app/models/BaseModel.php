<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once './app/controllers/LoginPageContoller.php';
class BaseModel extends LoginPageContoller
{
    protected $twig;

    public function __construct()
    {
        parent::__construct();

        $loader = new FilesystemLoader('app/views/templates');
        $this->twig = new Environment($loader);
    }

    protected function renderHTML(string $template_file_name, $context = [])
    {
        if ($this->is_user_logged === true) return $this->twig->render($template_file_name, $context);
        else return $this->twig->render('login-page.html.twig', ['page_title' => 'Login']);
    }
}
