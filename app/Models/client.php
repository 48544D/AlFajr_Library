<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use CrudTrait;
    protected $fillable=[
        'nom',
        'prenom',
        'email',
        'telephone',
    ];
    use HasFactory;
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
