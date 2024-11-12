<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewAppointment extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'specialist_id',
        'service_id',
        'name',
        'phone',
    ];

    /**
     * Get the user that owns the new appointment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the specialist for the new appointment.
     */
    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    /**
     * Get the service for the new appointment.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
