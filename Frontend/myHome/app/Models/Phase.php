<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    protected $table = 'tbl_phase';
    protected $primaryKey = "phase_id";
    public $incrementing = false;

    public function estate()
    {        
        return $this->belongsTo(Estate::class, 'estate_id', 'estate_id')->with('subdistrict');
    }

    public function property()
    {        
        return $this->hasMany(Property::class, 'property_id', 'property_id');
    }
}
