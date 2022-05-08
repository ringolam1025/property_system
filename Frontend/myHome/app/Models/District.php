<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'tbl_district';
    protected $primaryKey = "district_id";
    public $incrementing = false;

    public function subdistrict()
    {
        return $this->hasMany(SubDistrict::class,'district_id','district_id');
    }
}
