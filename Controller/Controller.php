<?php
namespace Controller;

use Core\View as View;
use Lazer\Classes\Database as DB;

class Controller
{
    public function index()
    {
        $article = DB::table('article')->orderBy('created_at', 'desc')->where('show_boolen', '=', 1)->with('category_articles')->pagination(6);
        $page    = $article->getPage();
        $view    = new View('home/index', ['article' => $article, 'page' => $page]);
        print $view;
    }
    public function categoryArticle($id)
    {

        $article           = DB::table('article')->where('category_article_id', '=', $id)->orderBy('created_at', 'desc')->with('category_articles')->pagination(6);
        $category_articles = DB::table('category_articles')->find($id);
        dd($category_articles);
        if ($category_articles) {
            $page = $article->getPage();
            $view = new View('home/index', ['article' => $article, 'page' => $page]);
            return print $view;
        }
    }
}
