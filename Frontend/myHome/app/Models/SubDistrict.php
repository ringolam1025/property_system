<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    protected $table = 'tbl_sub_district';
    protected $primaryKey = "sub_district_id";
    public $incrementing = false;

    public function district()
    {
        return $this->belongsTo(District::class,'district_id','district_id');
    }
}
