<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Course extends Model
{
    protected $fillable = [
        'college_id',
        'department_id',
        'course_code',
        'description',
        'units',
        'lecture_hours',
        'laboratory_hours',
        'prerequisite_course_id'
    ];
    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function prerequisite()
    {
        return $this->belongsTo(Course::class, 'prerequisite_course_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
