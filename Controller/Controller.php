<?php
namespace Controller;

use Core\View as View;
use Lazer\Classes\Database as DB;

class Controller
{
    public function index()
    {
        $article = DB::table('article')->orderBy('created_at', 'desc')->pagination(6);
        $page    = $article->getPage();
        // dd($page);
        $articlehot = DB::table('article')->orderBy('view', 'desc')->limit(5)->findAll();
        $view       = new View('home/index', ['article' => $article, 'articlehot' => $articlehot, 'page' => $page]);
        print $view;
    }
}
