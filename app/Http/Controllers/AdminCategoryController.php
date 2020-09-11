<?php

namespace App\Http\Controllers;
use App\Model\CategoryModel;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function catrjson(){
        $data = CategoryModel::where('is_del',1)->select('category_id','category_name')->get();
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}
