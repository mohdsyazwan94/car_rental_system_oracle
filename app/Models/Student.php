<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends User
{
    protected $table = 'student';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
    public $timestamps = false;

    public $fillable = [
        'student_id',
        'student_no',
        'course_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'student_id' => 'integer',
        'student_no' => 'string',
        'course_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_no' => 'required|string',
        'course_name' => 'required|string',
    ];

    public function info()
    {
        return $this->belongsTo(\App\Models\User::class, 'student_id', 'id');
    }
}
