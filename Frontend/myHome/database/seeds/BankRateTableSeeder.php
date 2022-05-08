<?php

use Illuminate\Database\Seeder;

class BankRateTableSeeder extends Seeder
{
    public function insertLink($bank_rate_id, $bank_eName, $rate, $cash_back){
        DB::table('tbl_bank_rate')->insert([
            'bank_rate_id' => $bank_rate_id,
            'bank_eName' => $bank_eName,
            'rate' => $rate,
            'cash_back' => $cash_back,
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
        // https://mortgage.28hse.com/en/bank_offer.html
        $this->insertLink('BR200001','Bank A',2.5, 1);
        $this->insertLink('BR200002','Bank B',2.5, 1);
        $this->insertLink('BR200003','Bank C',2.5, 1.5);
        $this->insertLink('BR200004','Bank D',2.5, 1.6);
    }
}
