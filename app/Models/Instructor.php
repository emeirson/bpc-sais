<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'instructor_code',
        'department_id',
        'lastname',
        'firstname',
        'middlename',
        'salutation',
        'sex',
        'birthdate',
        'barangay',
        'town',
        'province',
        'image',
        'professional_no',
        'appointment_nature',
        'employment_status',
        'date_hired',
        'status',
    ];

    public static function generateInstructorId()
    {
        // Get the current year
        $year = date('y'); // gets last two digits of the current year

        // School code
        $schoolCode = 'BPC';

        // Get the all instructor IDs for the current year, sort in desc order and get the first entry
        $count = self::where('instructor_code', 'like', "{$year}-{$schoolCode}-%")->orderBy('instructor_code', 'desc')->pluck('instructor_code')->first();

        if (($count)) {
            preg_match("/{$schoolCode}-0*(\d+)i/", $count, $matches);
            $count = (int) $matches[1] + 1;
        } else {
            $count = '1';
        }

        // generate new id
        $newNumber = str_pad($count, 4, '0', STR_PAD_LEFT);

        // Combine to form the new instructor ID
        return "{$year}-{$schoolCode}-{$newNumber}i";
    }

    public function fullname()
    {
        $fullname = "{$this->lastname}, {$this->firstname} " . substr($this->middlename, 0, 1);

        return  $fullname;
    }
}
