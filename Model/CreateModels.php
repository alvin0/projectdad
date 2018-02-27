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
        $this->CreateDBJsonContact();
        $this->CreateDBJsonAbout();
        $this->CreateDBJsonUsers();
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
            DB::create('category_articles', array(
                'id'   => 'integer',
                'name' => 'string',
            ));
        } catch (\Lazer\Classes\LazerException $e) {
            return false;
        }
    }

    public function CreateDBJsonUsers()
    {
        try {
            DB::create('users', array(
                'id'         => 'integer',
                'name'       => 'string',
                'email'      => 'string',
                'password'   => 'string',
                'role'       => 'integer',
                'created_at' => 'string',
                'updated_at' => 'string',
            ));
        } catch (\Lazer\Classes\LazerException $e) {
            return false;
        }
    }

    public function CreateDBJsonContact()
    {
        try {
            DB::create('contacts', array(
                'id'         => 'integer',
                'name'       => 'string',
                'email'      => 'string',
                'phone'      => 'string',
                'content'    => 'string',
                'created_at' => 'string',
                'updated_at' => 'string',
            ));
        } catch (\Lazer\Classes\LazerException $e) {
            return false;
        }
    }

    public function CreateDBJsonAbout()
    {
        try {
            DB::create('about', array(
                'id'         => 'integer',
                'title'      => 'string',
                'image'      => 'string',
                'snippet'    => 'string',
                'content'    => 'string',
                'created_at' => 'string',
                'updated_at' => 'string',
            ));
        } catch (\Lazer\Classes\LazerException $e) {
            return false;
        }
    }
}
