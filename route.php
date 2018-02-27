<?php
$route = [
    'index'         => ['use' => 'Controller@index'], // this is route default when load
    'home2'         => ['use' => 'CallTest2Test'],
    'admin'         => [
        'group' => [
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

        ]],
    'articledetail' => ['use' => 'User\ArticleController@getDetails'],

];
