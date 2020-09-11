<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class BrandModel extends Model
{


    //指定表面
    protected $table = 'shop_brand';
    protected $primaryKey = 'brand_id';
    public $timestamps = false;

    public function selected(){
      header("Content-type:utf8 application/json");
      $data = [
    {
        "id": 9,
        "text": "xxx"
    },
    {
        "id": 21,
        "text": "1111"
    },
    ]
      return response()->json($data);
    }





}
