<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use CrudTrait;
    protected $fillable = [
        'name',
        'price',
        'reference',
        'image',
        'sub_category_id',
        'estDisponible',
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
        return $this->belongsTo(subCategory::class);
    }

    public function order_details()
    {
        return $this->hasMany(Order_details::class);
    }

    public function promotion()
    {
        return $this->hasOne(Promotions::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('public')->delete($obj->image);
        });
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "images/products";
        //filename is the reference of the product with the .jpg extension
        $fileName = $this->reference . '.jpg';
        if ($value==null) {
            // delete the image from disk
            Storage::delete(Str::replaceFirst('storage/','public/',$this->{$attribute_name}));
            // set null in the database column
            $this->attributes[$attribute_name] =  $destination_path.'/'.$fileName;

        }
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName);
      
    }
}
