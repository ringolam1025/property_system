<?php

namespace App\Repositories;

use DB;
use App\Models\SubDistrict;
use App\Models\District;
use App\Models\Estate;
use App\Models\Phase;

class DBRepository
{
    public static function addZero($obj, $len){
		$counter = 0;

		if (strlen($obj) < $len){
			$counter = $len - strlen($obj);
			for ($i=0;$i<$counter;$i++){
				$obj = "0".$obj;
			}
		}
		return $obj;
	}

	public static function getEstateSelectData()
    {
        $results = Estate::select(['estate_id','estate_eName','estate_e_street_name'])->orderby('displayorder')->get();  

        foreach ($results as $result)
        {
            $options[$result->estate_id] = $result->estate_eName." (".$result->estate_e_street_name.")";
        }
        return $options;
	}

	public static function getPhaseSelectData()
    {
        $results = Phase::select(['phase_id','phase_eName'])->orderby('displayorder')->get();  

        foreach ($results as $result)
        {
            $options[$result->phase_id] = $result->phase_eName;
        }
        return $options;
	}
	
	public static function getSubDistrictSelectData()
    {
        $results = SubDistrict::select(['sub_district_id','subDistrict_eName'])->orderby('displayorder')->get();  

        foreach ($results as $result)
        {
            $options[$result->sub_district_id] = $result->subDistrict_eName;
        }
        return $options;
	}
    
    public static function getDistrictSelectData()
    {
        $districts = District::select(['district_id','district_cName','district_eName'])->orderby('displayorder')->get();  

        foreach ($districts as $district)
        {
            $options[$district->district_id] = $district->district_eName;
        }
        return $options;
	}

	// public static function getEstateSelectData()
    // {
    //     $results = Estate::select(['estate_id','estate_eName'])->orderby('displayorder')->get();  

    //     foreach ($results as $result)
    //     {
    //         $options[$result->estate_id] = $result->estate_eName;
    //     }
    //     return $options;
    // }

	public static function genAutoID($tbl, $col, $prefix)
	{
		$res = "";
		$counter = 0;	
		$currentMaxID = DB::table($tbl)->select($col)->max($col);
		    
        $res = preg_replace("/[a-zA-Z]/", "", $currentMaxID);
		for ($i=0;$i<strlen($res);$i++) {			
			if (substr($res,0,1) == '0'){
				$res = substr($res,1,strlen($res));
			}
		}
		$res = (($res*1)+1);
        $res = $prefix.(self::addZero($res, 6));
		return $res;
	}

	public static function getDisplayOrder()
	{
		$res = 999;
		$districts = District::select(['displayorder'])->orderby('displayorder')->get();  
		return $res;
	}

	public static function getTableSource($tbl)
	{

	}
}