<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id','id');
    }

    public function getSpriceAttribute($value) {
        return str_replace ('.', ',', $value);
    }

    public function setSpriceAttribute($value){
        $this->attributes['s_price'] = str_replace(',', '.', $value);
    }

    public function getPpriceAttribute($value) {
        return str_replace ('.', ',', $value);
    }

    public function setPpriceAttribute($value){
        $this->attributes['p_price'] = str_replace(',', '.', $value);
    }
}
