<?php

namespace App\Http\Controllers;
use App\Model\CategoryModel;
use App\Model\BrandModel;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function catrjson(){
        $data = CategoryModel::where('is_del',1)->select('category_id','category_name')->get();
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function brandjson(){
      // header("Content-type: application/json");

        $data = BrandModel::select('brand_id','brand_name')->get();
          $dat =[];
          $res=[];
          foreach ($data as $key => $value) {
              $dat['id']=$value['brand_id'];
              $dat['text'] =$value['brand_name'];
              array_push($res,$dat);
          }
          return $res;


         }

}
