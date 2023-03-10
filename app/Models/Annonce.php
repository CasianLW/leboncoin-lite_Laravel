<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'email',
        'name',
        'description',
        'location',
        'price',
        'token',
        'status'
    ];
}
