<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'room',
        'speciality',
        'image',
        'user_id',
        'department_id',
        'education',
        'experience_years',
        'biography',
        'languages',
        'certifications',
        'awards',
        'working_hours',
        'address',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
