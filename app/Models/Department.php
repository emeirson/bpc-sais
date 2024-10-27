<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'college_id',
        'department_code',
        'description'
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
