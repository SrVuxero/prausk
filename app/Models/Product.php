<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;


    protected $dates = ['deleted_at'];
    protected $fillable = [
        "name",
        "price",
        "stock" ,
        "photo",
        "desc",
        "category_id",
        "stand",
    ];

    public function transactions(){
      return $this->hasMany(Transaction::class)->withTrashed();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
