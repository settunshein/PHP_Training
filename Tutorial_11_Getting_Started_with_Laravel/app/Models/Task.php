<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function checkTaskStatus($task)
    {
        return $task->status == 1 ? 'fas fa-check-square' : 'far fa-square';
    }

    public function scopeComplete($query)
    {
        return $query->where('status', 1)->count();
    }
}
