<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = "customer_id";
    public $incrementing = false;

    public function user()
    {        
        return $this->belongsTo(Users::class, 'user_id', 'user_id');
    }

    public function district()
    {
        return $this->hasOne(District::class, 'district_id', 'district_id');
    }
}
