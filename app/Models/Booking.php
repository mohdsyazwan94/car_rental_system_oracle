<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'booking';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'vehicle_id',
        'user_id',
        'approved_by',
        'booking_start_date',
        'booking_end_date',
        'booking_total',
        'booking_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'booking_id' => 'integer',
        'vehicle_id' => 'integer',
        'user_id' => 'integer',
        'approved_by' => 'integer',
        'booking_start_date' => 'datetime',
        'booking_end_date' => 'datetime',
        'booking_total' => 'double',
        'booking_status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vehicle_id' => 'required|integer',
        'user_id' => 'nullable|integer',
        'approved_by' => 'required|integer',
        'booking_start_date' => 'required|datetime',
        'booking_end_date' => 'required|datetime',
        'booking_total' => 'required|double',
        'booking_status' => 'required|string'
    ];

    public function vehicleDetails()
    {
        return $this->belongsTo(\App\Models\Vehicle::class, 'vehicle_id');
    }

    public function studentDetails()
    {
        return $this->belongsTo(\App\Models\Student::class, 'user_id');
    }

    public function staffDetails()
    {
        return $this->belongsTo(\App\Models\Staff::class, 'user_id');
    }

    public function managerDetails()
    {
        return $this->belongsTo(\App\Models\Staff::class, 'approved_by');
    }
}
