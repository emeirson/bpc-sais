<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProgramLevel extends Model
{
    protected $fillable = [
        'student_id',
        'year_level_id',
        'academic_year_id',
        'program_id',
        'grade'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class);
    }
}
