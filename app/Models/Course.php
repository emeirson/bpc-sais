<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'description',
        'units',
        'lecture_hours',
        'laboratory_hours',
        'prerequisite_course_id'
    ];
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
    public function prerequisite()
    {
        return $this->belongsTo(Course::class, 'prerequisite_course_id');
    }
}
