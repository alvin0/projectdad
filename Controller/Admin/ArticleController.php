<?php
namespace Controller\Admin;

use Core\Route as Route;
use Core\View as View;
use Lazer\Classes\Database as DB;

class ArticleController
{
    public function getlist()
    {
        $article = DB::table('article')->with('category_articles')->findAll();
        $view    = new View('admin/article/list', ['article' => $article]);
        print $view;
    }

    public function getcreate()
    {
        $category_articles = DB::table('category_articles')->findAll();
        $view              = new View('admin/article/create', ['category_articles' => $category_articles]);
        print $view;
    }
    public function postcreate($id = null)
    {
        if ($id) {
            $article = DB::table('article')->find($id);
        } else {
            $article = DB::table('article');
        }
        // dd($_POST);
        $article->category_article_id = (int) $_POST['category_article_id'];
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
        $article           = DB::table('article')->find($id);
        $category_articles = DB::table('category_articles')->findAll();
        $view              = new View('admin/article/create', ['article' => $article, 'category_articles' => $category_articles]);
        print $view;
    }

    public function postArticleDelete()
    {
        $article = DB::table('article')->find($_POST['idArticleDelete']);

        DB::table('article')->find($_POST['idArticleDelete'])->delete(); //Will remove row with ID 1
        Route::callRouteUrl('articlelist', 'admin');
    }

    public function getListCategory()
    {
        $category_articles = DB::table('category_articles')->with('article')->findAll();
        $view              = new View('admin/category_article/list', ['category_articles' => $category_articles]);
        print $view;
    }

    public function getCreateCategoryArticle()
    {
        $view = new View('admin/category_article/create');
        print $view;
    }
    public function postCreateCategoryArticle()
    {
        if ($id) {
            $category_articles = DB::table('category_articles')->find($id);
        } else {
            $category_articles = DB::table('category_articles');
        }
        $category_articles->name = $_POST['name'];
        $category_articles->save();
        Route::callRouteUrl('categoryarticlelist', 'admin');
    }
    public function postCategoryArticleDelete()
    {
        $category_articles = DB::table('article')->where('category_article_id', '=', $_POST['idCategoryArticleDelete'])->findAll()->count();
        if ($category_articles < 1) {
            DB::table('category_articles')->find($_POST['idCategoryArticleDelete'])->delete(); //Will remove row with ID 1
        }
        Route::callRouteUrl('categoryarticlelist', 'admin');
    }
}
