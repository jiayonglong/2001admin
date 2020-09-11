<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;

class CategoryModel extends Model
{
    use ModelTree;
    //指定表面
    protected $table = 'shop_category';
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('p_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('category_name');
    }
}
