<?php

use Illuminate\Database\Seeder;

class MortgageTableSeeder extends Seeder
{
    public function insertLink($morgtgage_id,$mortgage_from, $mortgage_to,$mortgage_rate_from, $mortgage_rate_to,$max_mortgage_price){
        DB::table('tbl_mortgage_rate')->insert([
            'morgtgage_id' => $morgtgage_id,
            'mortgage_from' => $mortgage_from,
            'mortgage_to' => $mortgage_to,
            'mortgage_rate_from' => $mortgage_rate_from,
            'mortgage_rate_to' => $mortgage_rate_to,
            'max_mortgage_price' => $max_mortgage_price,
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
        // https://www.midland.com.hk/calculator/new-measures-on-mortgage.jsp
        $this->insertLink('MR2000001',0,8000000,90,0,0);
        $this->insertLink('MR2000002',8000000,9000000,80,90,7200000);
        $this->insertLink('MR2000003',9000000,10000000,80,0,0);
    }
}
