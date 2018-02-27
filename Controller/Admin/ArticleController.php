<?php
namespace Controller\Admin;

use Core\Route as Route;
use Core\View as View;
use Lazer\Classes\Database as DB;

class ArticleController
{
    public function getlist()
    {
        $article = DB::table('article')->findAll();
        $view    = new View('admin/article/list', ['article' => $article]);
        print $view;
    }

    public function getcreate()
    {
        $view = new View('admin/article/create');
        print $view;
    }
    public function postcreate($id = null)
    {
        if ($id) {
            $article = DB::table('article')->find($id);
        } else {
            $article = DB::table('article');
        }
        $article->category_article_id = 1;
        $article->title               = $_POST['title'];
        if ($_FILES['image_index']['name'] != '') {
            $article->image_index = ImagePost('image_index', 'article') ? ImagePost('image_index', 'article/') : 'null';
        }
        $article->image_gallery = 'null';
        $article->snippet       = $_POST['snippet'];
        $article->content       = $_POST['content'];
        if (!$id) {
            $article->view       = 0;
            $article->created_at = date('Y/m/d H:i:s');
        }
        $article->show_boolen = isset($_POST['show_boolen']) ? 1 : 0;
        $article->updated_at  = date('Y/m/d H:i:s');
        $article->save();
        Route::callRouteUrl('articlelist', 'admin');
    }

    public function getupdate($id)
    {
        $article = DB::table('article')->find($id);
        $view    = new View('admin/article/create', ['article' => $article]);
        print $view;
    }

    public function postDelete()
    {
        $article = DB::table('article')->find($_POST['idArticleDelete']);

        DB::table('article')->find($_POST['idArticleDelete'])->delete(); //Will remove row with ID 1
        Route::callRouteUrl('articlelist', 'admin');
    }

    public function getListCategory()
    {
        # code...
    }
}
