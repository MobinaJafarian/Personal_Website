<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationTracker extends Model
{
    use HasFactory;
    protected $fillable = [
        'company-name',
        'job-title',
        'salary',
        'location',
        'link',
        'note',
        'todo',
        'file',
    ];
}
