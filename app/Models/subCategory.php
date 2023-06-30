<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use CrudTrait;
    protected $fillable = [
        'name',
        'category_id',
    ];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
