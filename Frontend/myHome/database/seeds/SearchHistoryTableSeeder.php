<?php

use Illuminate\Database\Seeder;

class SearchHistoryTableSeeder extends Seeder
{
    public function insertLink($search_category, $search_val, $platform){
        DB::table('tbl_search_history')->insert([
            'session_id' => '',
            'search_date' => date("Y-m-d H:i:s"),
            'search_category' => $search_category,
            'search_val' => $search_val,
            'platform' => $platform,
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
        $platform = array("chatbot", "website");
        $data = array(array("search_category"=>"tranType", "data"=>array("Sales", "Rent")),
                    array("search_category"=>"district", "data"=>array("Tuen Mun", "Yuen Long", "Tin Shui Wai", "Tin Hau", "The Peak", "Stanley", "Kowloon Station", "Yau Ma Tei", "Tsim Sha Tsui", "Chai Wan", "Heng Fa Chuen")),
        );
        for ($i=0; $i < 2000; $i++) {            
            $searchCat = rand(0, (sizeof($data)-1));
            $this->insertLink($data[$searchCat]['search_category'],$data[$searchCat]['data'][rand(0, (sizeof($data[$searchCat]['data'])-1))],$platform[rand(0, (sizeof($platform)-1))]);
        }       
    }
}
