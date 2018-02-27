<?php
namespace Model;

use Lazer\Classes\Relation as Relation;

/**
 * RelationsModel
 */
class RelationsModel
{
    public function boot()
    {
        $this->ArticleAndCategory();
    }

    public function ArticleAndCategory()
    {
        Relation::table('article')->belongsTo('category_articles')->localKey('category_article_id')->foreignKey('id')->setRelation();
        Relation::table('category_articles')->hasMany('article')->localKey('id')->foreignKey('category_article_id')->setRelation();
    }
}
