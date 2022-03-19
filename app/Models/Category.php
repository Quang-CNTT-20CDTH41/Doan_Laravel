<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // localScope
    public function scopeSearch($query)
    {
        if ($search = request()->search) {
            $query = $query->where('name', 'like', '%' . $search . '%');
        }
        return $query;
    }
    // globalScope
}
