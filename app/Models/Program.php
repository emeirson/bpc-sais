<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'department_id',
        'program_code',
        'description'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }
}