<?php
$route = [
    'index'          => ['use' => 'Controller@index'], // this is route default when load
    'about'          => ['use' => 'Controller@about'], // this is route default when load
    'contact'        => ['use' => 'Controller@getContact'], // this is route default when load
    'postContact'    => ['use' => 'Controller@postContact'], // this is route default when load
    'search'         => ['use' => 'Controller@search'], // this is route default when load
    'category'       => ['use' => 'Controller@categoryArticle'],
    'loginAdmin'     => ['use' => 'Admin\UserController@getlogin'],
    'postLoginAdmin' => ['use' => 'Admin\UserController@postLogin'],
    'admin'          => [
        'middleware' => ['use' => 'AdminMiddleware'],
        'group'      => [
            'home'                   => ['use' => 'Admin\ArticleController@getlist'],
            //article
            'articlelist'            => ['use' => 'Admin\ArticleController@getlist'],
            'articlenew'             => ['use' => 'Admin\ArticleController@getcreate'],
            'postcreatearticle'      => ['use' => 'Admin\ArticleController@postcreate'],
            'articleupdate'          => ['use' => 'Admin\ArticleController@getupdate'],
            'postarticledelete'      => ['use' => 'Admin\ArticleController@postArticleDelete'],

            //category article
            'categoryarticlelist'    => ['use' => 'Admin\ArticleController@getListCategory'],
            'categoryarticlenew'     => ['use' => 'Admin\ArticleController@getCreateCategoryArticle'],
            'postcategoryarticlenew' => ['use' => 'Admin\ArticleController@postCreateCategoryArticle'],
            'categoryarticledelete'  => ['use' => 'Admin\ArticleController@postCategoryArticleDelete'],

            //about
            'about'                  => ['use' => 'Admin\AboutController@index'],
            'updateabout'            => ['use' => 'Admin\AboutController@postAbout'],

            //contact
            'contact'                => ['use' => 'Admin\ContactController@index'],

            //user
            'logout'                 => ['use' => 'Admin\UserController@Logout'],
        ]],
    'articledetail'  => ['use' => 'User\ArticleController@getDetails'],

];
