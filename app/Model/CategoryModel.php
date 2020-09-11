<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Traits\AdminBuilder;
class CategoryModel extends Model
{
    use ModelTree,AdminBuilder;

    //指定表面
    protected $table = 'shop_category';
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('p_id');  // 父ID
        $this->setOrderColumn('sort'); // 排序
        $this->setTitleColumn('category_name'); // 标题
    }
}
