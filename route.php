<?php
$route = [
    'index'         => ['use' => 'Controller@index'], // this is route default when load
    'home2'         => ['use' => 'CallTest2Test'],
    'admin'         => [
        'group' => [
            'home'              => ['use' => 'Admin\ArticleController@getlist'],
            'articlelist'       => ['use' => 'Admin\ArticleController@getlist'],
            'articlenew'        => ['use' => 'Admin\ArticleController@getcreate'],
            'postcreatearticle' => ['use' => 'Admin\ArticleController@postcreate'],
            'articleupdate'     => ['use' => 'Admin\ArticleController@getupdate'],
        ]],
    'articledetail' => ['use' => 'User\ArticleController@getDetails'],

];
