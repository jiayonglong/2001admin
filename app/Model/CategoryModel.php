<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    //指定表面
    protected $table = 'shop_category';
    protected $primaryKey = 'category_id';
    public $timestamps = false;
}
