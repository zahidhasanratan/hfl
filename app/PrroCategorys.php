<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryManage;
use App\ProductManage;
class PrroCategorys extends Model
{
    public function Category(){
        return $this->belongsTo(CategoryManage::class,'cat_id');
    }

    public function Product(){

        return $this->belongsTo(ProductManage::class,'pro_id');
    }
}
