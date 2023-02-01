<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Staff extends User
{

    public $fillable = [
        'manager_id',
        'date_joined',
        'designation',
        'salary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'staff_id' => 'integer',
        'manager_id' => 'integer',
        'date_joined' => 'datetime',
        'designation' => 'string',
        'salary' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'manager_id' => 'required|integer',
        'payment_date' => 'required|datetime',
        'payment_total' => 'required|double',
    ];

    public function managerDetails()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id');
    }
}
