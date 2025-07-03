<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'cv_path',
    ];

    // Relation back to job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

