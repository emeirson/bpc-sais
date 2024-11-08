<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ClassCourse extends Model
{
    protected $fillable = [
        'class_code',
        'course_id',
        'semester_id',
        'instructor_id',
        'semester_id',
        'room_id',
        'section_id',
        'start_time',
        'end_time',
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
    public function getTime()
    {
        $startTime = Carbon::createFromFormat('H:i:s', $this->start_time)->format('g:i A');
        $endTime = Carbon::createFromFormat('H:i:s', $this->end_time)->format('g:i A');

        return $startTime . ' - ' . $endTime;
    }
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }
}
