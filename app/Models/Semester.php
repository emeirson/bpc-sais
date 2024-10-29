<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'academic_year_id',
        'name'
    ];
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
    public function details()
    {
        return 'AY: ' . $this->academicYear->getYear() . ' / ' . strtoupper($this->name);
    }
}
