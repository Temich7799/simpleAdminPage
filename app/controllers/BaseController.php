<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BaseController
{
    protected $request;
    protected $response;

    protected $twig;

    public function __construct(Request $request, Response  $response)
    {
        $this->request = $request;
        $this->response = $response;

        $loader = new FilesystemLoader('app/views/templates');
        $this->twig = new Environment($loader);
    }

    protected function sendRenderedTwigPage($template_file_name, $context = [])
    {
        $this->response->getBody()->write($this->twig->render($template_file_name, $context));
        return $this->response;
    }
}
