<?php
namespace Controller\Admin;

use Core\View as View;
use Lazer\Classes\Database as DB;

class ArticleController
{
    protected $article;

    public function __construct()
    {
        $this->article = DB::table('article');
    }

    public function getlist()
    {
        $view = new View('admin/article/list');
        print $view;
    }

    public function getcreate()
    {
        $view = new View('admin/article/create');
        print $view;
    }
    public function postcreate()
    {
        print_r($_POST);
        die;
    }
}
