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
        'total_quant',
        'total_price',
        'estTraite',
    ];
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(client::class);
    }
    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }
    
}
