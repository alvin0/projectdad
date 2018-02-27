<?php
namespace Controller\User;

use Core\View as View;
use Lazer\Classes\Database as DB;

/**
 * Article
 */
class ArticleController
{
    public function getDetails($id)
    {
        $article       = DB::table('article')->find($id);
        $article->view = $article->view + 1;
        $article->save();
        $view              = new View('home/article/detail', ['article' => $article]);
        $view->title       = $article->title;
        $view->description = \Helper\Helper::shorten_string($article->snippet, 10);
        print $view;
    }
}
