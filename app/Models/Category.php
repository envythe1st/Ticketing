<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'm_category';

    protected $fillable = [
        'category_id',
        'category_name',
        'status',
    ];
}
