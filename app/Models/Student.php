<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_code',
        'lastname',
        'firstname',
        'middlename',
        'name_extension',
        'barangay',
        'town',
        'province',
        'birthdate',
        'birthplace',
        'sex',
        'civil_status',
        'religion',
        'mother_tongue',
        'citizenship',
        'mobile_number',
        'email',

        // Family Information
        'father_lastname',
        'father_firstname',
        'father_middlename',
        'father_education',
        'father_address',
        'father_mobile_number',
        'mother_lastname',
        'mother_firstname',
        'mother_middlename',
        'mother_education',
        'mother_address',
        'mother_mobile_number',
        'beneficiary_4ps',

        // Academic Information
        'school_name',
        'school_address',
        'honors_received',
        'year_graduated',
    ];

    public function fullname()
    {
        $fullname = '';

        if (!$this->middlename) {
            $fullname = "{$this->lastname}, {$this->firstname} {$this->name_extension}";
        } else {
            $fullname = "{$this->lastname}, {$this->firstname} " . substr($this->middlename, 0, 1) . ' .' . $this->name_extension;
        }
        return  $fullname;
    }
    public static function generateStudentId()
    {
        // Get the current year
        $year = date('y'); // gets last two digits of the current year

        // School code
        $schoolCode = 'BPC';

        // Get the all student IDs for the current year, sort in desc order and get the first entry
        $count = self::where('student_code', 'like', "{$year}-{$schoolCode}-%")->orderBy('student_code', 'desc')->pluck('student_code')->first();

        if (($count)) {
            preg_match("/{$schoolCode}-0*(\d+)/", $count, $matches);
            $count = (int) $matches[1] + 1;
        } else {
            $count = '1';
        }

        // generate new id
        $newNumber = str_pad($count, 4, '0', STR_PAD_LEFT);

        // Combine to form the new student ID
        return "{$year}-{$schoolCode}-{$newNumber}";
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
