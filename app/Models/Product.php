<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'image', 'image_list', 'sale_price', 'category_id', 'description'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // localScope
    public function scopeSearch($query)
    {
        if ($search = request()->search) {
            $query = $query->where('name', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
