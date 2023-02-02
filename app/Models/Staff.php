<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Staff extends User
{
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';
    public $incrementing = false;
    public $timestamps = false;

    public $fillable = [
        'staff_id',
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
        'date_joined' => 'date',
        'designation' => 'string',
        'salary' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'staff_id' => 'required|integer',
        'manager_id' => 'required|integer',
        'date_joined' => 'required',
        'designation' => 'required',
        'salary' => 'required'
    ];

    public function managerDetails()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id');
    }

    public function info()
    {
        return $this->belongsTo(\App\Models\User::class, 'staff_id', 'id');
    }
}
