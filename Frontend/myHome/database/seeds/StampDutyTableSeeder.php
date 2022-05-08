<?php

use Illuminate\Database\Seeder;

class StampDutyTableSeeder extends Seeder
{
    public function insertLink($stamp_duty_id, $from, $to, $rate, $rate_type, $exceed, $basePrice, $scale){
        DB::table('tbl_stamp_duty')->insert([
            'stamp_duty_id' => $stamp_duty_id,
            'from' => $from,
            'to' => $to,
            'rate' => $rate,
            'rate_type'=>$rate_type,
            'exceed' => $exceed,
            'basePrice' => $basePrice,
            'scale' => $scale,
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
        // https://www.gov.hk/tc/residents/taxes/stamp/stamp_duty_rates.htm
        $this->insertLink('ST2000001',0,2000000,1.5,'percentage',0,0,1);
        $this->insertLink('ST2000002',2000000,2176470,20,'percentage',2000000,30000,1);
        $this->insertLink('ST2000003',2176470,3000000,3,'percentage',0,0,1);
        $this->insertLink('ST2000004',3000000,3290330,20,'percentage',3000000,90000,1);
        $this->insertLink('ST2000005',3290330,4000000,4.5,'percentage',0,0,1);
        $this->insertLink('ST2000006',4000000,4428580,20,'percentage',4000000,180000,1);
        $this->insertLink('ST2000007',4428580,6000000,6,'percentage',0,0,1);
        $this->insertLink('ST2000008',6000000,6720000,20,'percentage',6000000,360000,1);
        $this->insertLink('ST2000009',6720000,20000000,7.5,'percentage',0,0,1);
        $this->insertLink('ST2000010',20000000,21739130,20,'percentage',20000000,1500000,1);
        $this->insertLink('ST2000011',21739130,999999999,8.5,'percentage',0,0,1);

        $this->insertLink('ST2000012',0,2000000,100,'amount',0,0,2);
        $this->insertLink('ST2000013',2000000,2351760,10,'percentage',2000000,100,2);
        $this->insertLink('ST2000014',2351760,3000000,1.5,'percentage',0,0,2);
        $this->insertLink('ST2000015',3000000,3290320,10,'percentage',3000000,45000,2);
        $this->insertLink('ST2000016',3290320,4000000,2.25,'percentage',0,0,2);
        $this->insertLink('ST2000017',4000000,4428570,10,'percentage',4000000,90000,2);
        $this->insertLink('ST2000018',4428570,6000000,3,'percentage',0,0,2);
        $this->insertLink('ST2000019',6000000,6720000,10,'percentage',6000000,180000,2);
        $this->insertLink('ST2000020',6720000,20000000,3.75,'percentage',0,0,2);
        $this->insertLink('ST2000021',20000000,21739120,10,'percentage',20000000,750000,2);
        $this->insertLink('ST2000022',21739120,999999999,4.25,'percentage',0,0,2);
    }
}
