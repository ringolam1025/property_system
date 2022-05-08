<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'tbl_agent';
    protected $primaryKey = "agent_id";
    public $incrementing = false;

    public function branch()
    {        
        return $this->belongsTo(Branches::class, 'branch_id', 'branch_id');
    }

    public function appointment()
    {        
        return $this->hasMany(Branches::class, 'agent_id', 'agent_id');
    }
}
