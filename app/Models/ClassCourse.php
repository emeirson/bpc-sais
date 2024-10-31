<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    protected $fillable = [
        'class_code',
        'course_id',
        'semester_id',
        'instructor_id',
        'semester_id',
        'room_id',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
