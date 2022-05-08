<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $table = 'tbl_branch';
    protected $primaryKey = "branch_id";
    public $incrementing = false;

    public function agent()
    {        
        return $this->hasMany(Agent::class, 'branch_id', 'branch_id');
    }

    public function sub_district()
    {        
        return $this->belongsTo(SubDistrict::class, 'sub_district_id', 'sub_district_id');
    }
}
