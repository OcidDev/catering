<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    Protected $fillable = [
        'merchant_id',
        'category_id',
        'name',
        'slug',
        'price',
        'description',
        'image',
    ];

    // Relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

}
