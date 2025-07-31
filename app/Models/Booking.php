<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['doctor_id', 'patient_name', 'patient_phone', 'booking_date', 'booking_time', 'status', 'note'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
