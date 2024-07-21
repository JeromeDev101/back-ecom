<?php

namespace App\Models;

use App\Models\FacultyScholar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faculties';
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'nature_of_appointment_id',
        'gender',
        'academic_rank_id',
        'educational_attainment_id'
    ];
    public function facultyScholar()
    {
        return $this->hasMany(FacultyScholar::class);
    }
}
