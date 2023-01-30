<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'vehicle';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'vehicle_type',
        'vehicle_color',
        'vehicle_registration',
        'vehicle_rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'vehicle_id' => 'integer',
        'vehicle_type' => 'string',
        'vehicle_color' => 'string',
        'vehicle_registration' => 'string',
        'vehicle_rate' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vehicle_type' => 'required|string|max:30',
        'vehicle_color' => 'required|string|max:30',
        'vehicle_registration' => 'required|string|max:50',
        'vehicle_rate' => 'required|double',
    ];

    // public function roomStatus()
    // {
    //     return $this->belongsTo(\App\Models\RoomStatus::class, 'room_status_id');
    // }

    // public function roomTypes()
    // {
    //     return $this->belongsTo(\App\Models\RoomType::class, 'room_type_id');
    // }
}
