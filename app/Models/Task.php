<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $casts = [
        'due_date' => 'date',
        'completed' => 'boolean'
    ];
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'completed',
        'progress', // جديد
        'order' // جديد
    ];
}
