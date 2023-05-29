<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use CrudTrait;
    protected $fillable=[
        'client_id',
        'product_id',
        'quantity',
        'total',
        'estTraite',
    ];
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(client::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
    
}
