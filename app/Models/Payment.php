<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;

    use SoftDeletes;

    use HasFactory;

    public $table = 'payment';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'booking_id',
        'payment_date',
        'payment_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'payment_id' => 'integer',
        'booking_id' => 'integer',
        'payment_date' => 'datetime',
        'payment_total' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reservation_id' => 'required|integer',
        'payment_date' => 'required|datetime',
        'payment_total' => 'required|double',
    ];

    public function bookingDetails()
    {
        return $this->belongsTo(\App\Models\Booking::class, 'booking_id');
    }
}
