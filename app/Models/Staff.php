<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'specialist_id',
        'image',
    ];

    /**
     * Get the specialist that owns the staff.
     */
    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}
