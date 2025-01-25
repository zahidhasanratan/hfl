<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PrroCategorys;
class ProductManage extends Model
{

     public function Cateogry(){

        return $this->hasMany(PrroCategorys::class,'pro_id');
     }


     public function MainCategory(){

        return $this->belongsTo(CategoryManage::class,'cat_id');
     }

     public function TCate(){
         return $this->hasOne(TCategory::class,'id','t_cat_id');
     }


     public function GCate(){
        return $this->hasOne(GCategory::class,'id','g_cat_id');
    }

}
