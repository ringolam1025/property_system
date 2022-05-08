<?php

use Illuminate\Database\Seeder;

class CompanySettingTableSeeder extends Seeder
{
    public function insertLink($company_eName, $booking_session){
        DB::table('tbl_company_setting')->insert([
            'company_eName' => $company_eName,
            'booking_session' => $booking_session,
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
        $this->insertLink('MyHome',120);
    }
}
