<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $table = 'payment';
    protected $primaryKey = 'payment_id';
    public $timestamps = false;

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
        'booking_id' => 'required|integer'
    ];

    public function bookingDetails()
    {
        return $this->belongsTo(\App\Models\Booking::class, 'booking_id');
    }
}
