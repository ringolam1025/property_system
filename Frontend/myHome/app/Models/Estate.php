<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $table = 'tbl_estate';
    protected $primaryKey = "estate_id";
    public $incrementing = false;

    public function phase()
    {
        return $this->hasMany(Phase::class, 'estate_id', 'estate_id');
    }

    public function subdistrict()
    {
        return $this->hasMany(SubDistrict::class, 'sub_district_id', 'sub_district_id')->with('district');
    }
}
