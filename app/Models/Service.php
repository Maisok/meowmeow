<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'price',
    ];

    /**
     * Get the specialists for the service.
     */

     public function specialists()
    {
        return $this->hasMany(Specialist::class);
    }
    /**
     * Get the new appointments for the service.
     */
    public function newAppointments()
    {
        return $this->hasMany(NewAppointment::class);
    }
}
