<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurriculumCertification extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'faculty_ids' => 'json',
    ];
}
