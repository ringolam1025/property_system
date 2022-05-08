<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'tbl_booking';
    protected $primaryKey = "booking_id";
    public $incrementing = false;

    public function agent()
    {        
        return $this->belongsTo(Agent::class, 'agent_id', 'agent_id');
    }

    public function property()
    {        
        return $this->belongsTo(Property::class, 'property_id', 'property_id')->with('phase');
    }
}
