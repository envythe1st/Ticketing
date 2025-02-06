<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'm_ticket';

    protected $fillable = [
        'group_name',
        'category_id',
        'status',
        'details',
        'handled_by',
        'sender'
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function handledBy()
    {
        return $this->belongsTo(User::class, 'handled_by');
    }
}
