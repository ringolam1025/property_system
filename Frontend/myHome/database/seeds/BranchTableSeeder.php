<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    public function insertLink($branch_id, $cName, $eName, $cAddress, $eAddress, $phone1, $phone2, $desc){
        DB::table('tbl_branch')->insert([
            'branch_id' => $branch_id,
            'branch_cName' => $cName,
            'branch_eName' => $eName,
            'branch_cAddress' => $cAddress,
            'branch_eAddress' => $eAddress,
            'branch_phone1' => $phone1,
            'branch_phone2' => $phone2,
            'branch_desc' => $desc,
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
        //$this->insertLink('B000001', '', '', '', '','')
    }
}
