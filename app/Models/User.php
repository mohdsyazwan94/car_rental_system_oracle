<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'password',
        'email',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'password' => 'string',
        'email' => 'string',
        'phone' => 'string'
    ];

    public static $rules = [
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
    ];

    // public function full_name(){
    //     return $this->full_name;
    // }

    // public function userType(){
    //     return 
    // }

    // public function staffs()
    // {
    //     return $this->belongsTo(\App\Models\Staff::class, 'id');
    // }

    // public function students()
    // {
    //     return $this->belongsTo(\App\Models\Student::class, 'id');
    // }
}
