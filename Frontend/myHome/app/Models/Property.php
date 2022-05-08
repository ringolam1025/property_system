<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'tbl_property';
    protected $primaryKey = "property_id";
    public $incrementing = false;

    public function propertyPhoto()
    {        
        return $this->hasMany(PropertyPhoto::class, 'property_id', 'property_id');
    }

    public function propertyUnitPhoto()
    {        
        return $this->hasMany(PropertyPhoto::class, 'property_id', 'property_id')->where('photo_type', '=','unitPhoto');
    }

    public function propertyFloorPlan()
    {        
        return $this->hasMany(PropertyPhoto::class, 'property_id', 'property_id')->where('photo_type', '=','floorPlan');
    }

    public function phase()
    {        
        return $this->hasOne(Phase::class, 'phase_id', 'phase_id')->with('estate');
    }

    public function agent()
    {        
        return $this->hasOne(Agent::class, 'agent_id', 'agent_id');
    }   

    public function appointment()
    {        
        return $this->hasMany(Appointment::class, 'property_id', 'property_id');
    }

    public function demoPhoto()
    {
        return $this->hasOne(PropertyPhoto::class, 'property_id', 'property_id')->where('photo_type', '=','unitPhoto');
    }
    public function template()
    {
        return $this->hasOne(Template::class, 'template_id', 'id');
    }
}
