<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'company_description',
        'company_phone',
        'company_address',
        'company_ward',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
