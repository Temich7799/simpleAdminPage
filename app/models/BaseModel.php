<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once './app/controllers/LoginPageContoller.php';
class BaseModel extends LoginPageContoller
{
    protected $twig;

    protected $is_user_logged = false;

    public function __construct()
    {
        $loader = new FilesystemLoader('app/views/templates');
        $this->twig = new Environment($loader);

        if ($this->isSessionExist() === true) {
            $this->is_user_logged = true;
            $this->saveSession();
        }
    }

    protected function renderHTML(string $template_file_name, $context = [])
    {
        if ($this->is_user_logged === true) return $this->twig->render($template_file_name, $context);
        else return $this->twig->render('login-page_template.html.twig', ['page_title' => 'Login']);
    }

    protected function isSessionExist()
    {
        if (isset($_COOKIE['sid'])) {
            $result =  mysqli_fetch_row($this->makeQueryToSQL("SELECT `session_id` FROM `users` WHERE `session_id` = '" . $_COOKIE['sid'] . "'"));
            if ($result === null || $result === false) return false;
            else return true;
        } else return false;
    }
}
