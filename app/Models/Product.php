<?php

namespace App\Models;

use App\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','lang_id'];


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }



    public function lang()
    {
        return $this->belongsTo(Product_lang::class,'lang_id');
    }



    public function get_product_language($language)
    {

    }



//   protected static function booted()
//   {
//       parent::addGlobalScope(new ProductScope());
//   }

}
