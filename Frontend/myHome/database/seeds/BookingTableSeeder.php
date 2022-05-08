<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingTableSeeder extends Seeder
{
    public function insertLink($booking_id,$property_id,$agent_id,$booked_date,$booked_start_time,$booked_end_time, $cust_name, $cust_email, $cust_phone){
        DB::table('tbl_booking')->insert([
            'booking_id' => $booking_id,
            'property_id' => $property_id,
            'agent_id' => $agent_id,
            'booked_date' => $booked_date,
            'booked_start_time' => $booked_start_time,
            'booked_end_time' => $booked_end_time,
            'cust_name' => $cust_name,
            'cust_email' => $cust_email,
            'cust_phone' => $cust_phone,
            'remark' => '',
            'status' => 'pending',
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
        $this->insertLink('BK2000001','P20000001','A2000001','2020-04-29','15:00:00','18:00:00','Ringo','ringoching93@gmail.com','98765432');
        $this->insertLink('BK2000002','P20000002','A2000002','2020-04-30','13:00:00','15:00:00','Peter Wong','myhomedemo02@gmail.com','25896358');
        $this->insertLink('BK2000003','P20000045','A2000004','2020-04-29','15:00:00','18:00:00','Ringo','ringoching93@gmail.com','98765432');
        $this->insertLink('BK2000004','P20000046','A2000005','2020-04-30','13:00:00','15:00:00','Peter Wong','myhomedemo01@gmail.com','25896358');
        $this->insertLink('BK2000005','P20000047','A2000006','2020-05-01','13:00:00','15:00:00','Ken','myhomedemo02@gmail.com','25896359');
        $this->insertLink('BK2000006','P20000048','A2000007','2020-05-02','13:00:00','15:00:00','Jeff','myhomedemo01@gmail.com','25896360');
        $this->insertLink('BK2000007','P20000049','A2000008','2020-05-03','13:00:00','15:00:00','Kim Chan','myhomedemo02@gmail.com','25896361');
        $this->insertLink('BK2000008','P20000050','A2000009','2020-05-04','13:00:00','15:00:00','Kay Lee','myhomedemo01@gmail.com','25896362');
        $this->insertLink('BK2000009','P20000051','A2000010','2020-05-05','13:00:00','15:00:00','Mary Wong','myhomedemo02@gmail.com','25896363');
        $this->insertLink('BK2000010','P20000052','A2000011','2020-05-06','13:00:00','15:00:00','May Chan','myhomedemo01@gmail.com','25896364');
        $this->insertLink('BK2000011','P20000053','A2000012','2020-05-06','13:00:00','15:00:00','Alice','myhomedemo02@gmail.com','25896365');
        $this->insertLink('BK2000012','P20000054','A2000013','2020-05-08','13:00:00','15:00:00','Lee','myhomedemo01@gmail.com','25896366');
        $this->insertLink('BK2000013','P20000055','A2000014','2020-05-08','13:00:00','15:00:00','Chan','myhomedemo02@gmail.com','25896367');
        $this->insertLink('BK2000014','P20000056','A2000015','2020-05-10','13:00:00','15:00:00','Tommy Li','myhomedemo01@gmail.com','25896368');
        $this->insertLink('BK2000015','P20000057','A2000016','2020-05-11','13:00:00','15:00:00','Cherry Wong','myhomedemo02@gmail.com','25896369');
        $this->insertLink('BK2000016','P20000058','A2000017','2020-05-12','13:00:00','15:00:00','Chan Siu Ming','myhomedemo01@gmail.com','25896370');
        $this->insertLink('BK2000017','P20000059','A2000018','2020-05-13','13:00:00','15:00:00','Tom','myhomedemo02@gmail.com','25896371');
        $this->insertLink('BK2000018','P20000060','A2000019','2020-05-14','13:00:00','15:00:00','Peter Wong','myhomedemo01@gmail.com','25896372');
        $this->insertLink('BK2000019','P20000061','A2000020','2020-05-15','13:00:00','15:00:00','Law','myhomedemo02@gmail.com','25896373');
        $this->insertLink('BK2000020','P20000062','A2000021','2020-05-16','13:00:00','15:00:00','Lau','myhomedemo01@gmail.com','25896374');
        $this->insertLink('BK2000021','P20000063','A2000022','2020-05-17','13:00:00','15:00:00','KK','myhomedemo02@gmail.com','25896375');
        $this->insertLink('BK2000022','P20000064','A2000023','2020-05-18','13:00:00','15:00:00','Timmy','myhomedemo01@gmail.com','25896376');
        $this->insertLink('BK2000023','P20000065','A2000024','2020-05-19','13:00:00','15:00:00','Chris','myhomedemo02@gmail.com','25896377');
        $this->insertLink('BK2000024','P20000066','A2000025','2020-05-20','13:00:00','15:00:00','Ivan ','myhomedemo01@gmail.com','25896378');
        $this->insertLink('BK2000025','P20000067','A2000026','2020-05-21','13:00:00','15:00:00','Lam','myhomedemo02@gmail.com','25896379');
        $this->insertLink('BK2000026','P20000068','A2000027','2020-05-22','13:00:00','15:00:00','Patrick','myhomedemo01@gmail.com','25896380');
        $this->insertLink('BK2000027','P20000069','A2000028','2020-05-23','13:00:00','15:00:00','Ho','myhomedemo02@gmail.com','25896381');
        $this->insertLink('BK2000028','P20000070','A2000029','2020-05-24','13:00:00','15:00:00','Henry','myhomedemo01@gmail.com','25896382');
        $this->insertLink('BK2000029','P20000071','A2000030','2020-05-25','13:00:00','15:00:00','Marco','myhomedemo02@gmail.com','25896383');
        $this->insertLink('BK2000030','P20000072','A2000031','2020-05-26','13:00:00','15:00:00','Fan','myhomedemo01@gmail.com','25896384');

    }
}

