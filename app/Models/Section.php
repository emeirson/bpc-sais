<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'program_id',
        'section_code',
        'year_level',
        'section'
    ];
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
