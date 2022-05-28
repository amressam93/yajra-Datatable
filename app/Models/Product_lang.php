<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_lang extends Model
{
    use HasFactory;

    protected $fillable = ['lang'];


    public function products()
    {
        return $this->hasMany(Product::class,'lang_id');
    }



}
