<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use CrudTrait;
    use HasFactory;

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function getLiscencePlateImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

    protected $fillable = [
        'image',
        'liscence_plate',
        'liscence_plate_image'
    ];
}
