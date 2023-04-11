<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'category',
        'stock',
    ];

    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
    }
    
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
