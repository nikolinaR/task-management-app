<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class Categories extends Model
{
    use NodeTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id', 'slug',
    ];

    public static function getTree()
    {
        $categories = self::get()->toTree();
        $traverse = function ($categories, $prefix = '-') use (&$traverse, &$allCats) {
            foreach ($categories as $category) {
                $allCats[] = ["name" => $prefix.' '.$category->name, "id" => $category->id];
                $traverse($category->children, $prefix.'-');
            }
            return $allCats;
        };
        return $traverse($categories);
    }

    public function project()
    {
        return $this->hasMany('App\Models\Project', 'category_id', 'id');
    }

}
