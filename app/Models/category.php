<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use CrudTrait;
    protected $fillable = [
        'name',
    ];

    use HasFactory;

    public function subCategories()
    {
        return $this->hasMany(subCategory::class);
    }
}
