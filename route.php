<?php
$route = [
    'home'  => ['use' => 'Controller@Test1'],
    'home2' => ['use' => 'CallTest2Test'],
    'admin' => [
        'group' => [
            'home'              => ['use' => 'Admin\ArticleController@getlist'],
            'articlelist'       => ['use' => 'Admin\ArticleController@getlist'],
            'articlenew'        => ['use' => 'Admin\ArticleController@getcreate'],
            'postcreatearticle' => ['use' => 'Admin\ArticleController@postcreate'],
        ]],
    // 'default' => ['function' => 'wellcome'],
];
