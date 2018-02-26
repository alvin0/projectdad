<?php
namespace Controller;

use Core\View as View;
use Lazer\Classes\Database as DB;

class Controller
{
    public function index()
    {
        $article = DB::table('article')->findAll();
        $view    = new View('home/index', ['article' => $article]);
        print $view;
    }
}
