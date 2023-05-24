<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationTracker extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'job_title',
        'salary',
        'location',
        'link',
        'note',
        'todo',
        'file',
        'status',
    ];

    protected $casts = [
        'status' => ApplicationStatus::class
    ];
}
