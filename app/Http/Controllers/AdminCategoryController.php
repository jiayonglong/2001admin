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
          // $res = [
          //   [
          //     'brand_id'    => 11,
          //     'brand_name'  => '解放军的就撒娇的',
          //   ],
          //   [
          //     'brand_id'    => 22,
          //     'brand_name'  => '解放军的就撒娇的',
          //   ],
          //   [
          //     'brand_id'    => 33,
          //     'brand_name'  => '解放军的就撒娇的',
          //   ]
          //
          // ];
          // return $res;
          $dat =[];
          $res=[];
          foreach ($data as $key => $value) {
              $dat['brand_id']=$value['brand_id'];
              $dat['text'] =$value['brand_name'];
              array_push($res,$dat);
          }
          return $res;


         }

}
