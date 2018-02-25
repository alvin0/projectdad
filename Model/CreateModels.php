<?php
namespace Model;

use Lazer\Classes\Database as DB;

/**
 * CreateModels
 * Create database table json
 */
class CreateModels
{
    public function boot()
    {
        $this->CreateDBJsonArticle();
        $this->CreateDBJsonCategoryArticle();
    }

    public function CreateDBJsonArticle()
    {
        try {
            DB::create('article', array(
                'id'                  => 'integer',
                'category_article_id' => 'integer',
                'title'               => 'string',
                'image_index'         => 'string',
                'image_gallery'       => 'string',
                'snippet'             => 'string',
                'content'             => 'string',
                'view'                => 'integer',
                'show_boolen'         => 'integer',
                'created_at'          => 'string',
                'updated_at'          => 'string',
            ));
        } catch (\Lazer\Classes\LazerException $e) {
            return false;
        }
    }

    public function CreateDBJsonCategoryArticle()
    {
        try {
            DB::create('category_article', array(
                'id'    => 'integer',
                'title' => 'string',
            ));
        } catch (\Lazer\Classes\LazerException $e) {
            return false;
        }
    }
}
