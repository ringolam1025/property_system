<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DistrictTableSeeder extends Seeder
{
    public function insertLink($district_id, $eName, $cName, $displayorder, $desc){
        DB::table('tbl_district')->insert([
            'district_id' => $district_id,
            'district_eName' => $eName,
            'district_cName' => $cName,            
            'displayorder' => $displayorder,
            'district_desc' => $desc,
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertLink('D000001', 'Hong Kong', '香港島',10 , '');
        $this->insertLink('D000002', 'Kowloon', '九龍',20, '');
        $this->insertLink('D000003', 'New Territories', '新界',30, '');
    }
}
