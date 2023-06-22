<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carousel extends Model
{
    use CrudTrait;
    protected $fillable = [
        'description',
        'image',
    ];

    use HasFactory;

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
    $destination_path = "images/carousel";
    //filename is the reference of the product with the .jpg extension
    $fileName = $value->getClientOriginalName();
    if ($value==null) {
        // delete the image from disk
        Storage::delete(Str::replaceFirst('storage/','public/',$this->{$attribute_name}));
        // set null in the database column
        $this->attributes[$attribute_name] =  $destination_path.'/'.$fileName;

    }
    $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName);
      
    }
}
