<?php
namespace Controller\User;

use Core\Route as Route;
use Core\View as View;
use Lazer\Classes\Database as DB;

/**
 * Article
 */
class ArticleController {
    public function getDetails($id) {
        $article = DB::table('article')->where('show_boolen', '=', 1)->find($id);
        if ($article != null) {
            $article->view = $article->view + 1;
            $article->save();
            $view              = new View('home/article/detail', ['article' => $article]);
            $view->title       = $article->title;
            $view->description = \Helper\Helper::shorten_string($article->snippet, 10);
            print $view;
        } else {
            Route::callRouteUrl('index');
        }

    }
}
