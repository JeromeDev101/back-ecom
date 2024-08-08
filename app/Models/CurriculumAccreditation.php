<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurriculumAccreditation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'curriculum_accreditations';
    protected $fillable = [
        'program_id',
        'level',
        'status',
        'date_visit'
    ];
}
