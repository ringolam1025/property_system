<?php

use Illuminate\Database\Seeder;

class SubDistrictTableSeeder extends Seeder
{
    public function insertLink($branch_id, $eName, $cName, $displayorder, $desc, $district_id){
        DB::table('tbl_sub_district')->insert([
            'sub_district_id' => $branch_id,
            'subDistrict_cName' => $cName,
            'subDistrict_eName' => $eName,
            'displayorder' => $displayorder,
            'subDistrict_desc' => $desc,
            'district_id' => $district_id,
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
        // Hong Kong Island
        $this->insertLink('SD000001', 'Chai Wan', '柴灣',10, '','D000001');
        $this->insertLink('SD000002', 'Heng Fa Chuen', '杏花邨 (柴灣)',20, '','D000001');
        $this->insertLink('SD000003', 'Shau Kei Wan', '筲箕灣',30, '','D000001');
        $this->insertLink('SD000004', 'Sai Wan Ho / Taikoo', '西灣河 / 太古',40, '','D000001');
        $this->insertLink('SD000005', 'Quarry Bay', '鰂魚涌',50, '','D000001');
        $this->insertLink('SD000006', 'North Point / Fortress Hill', '北角 / 炮台山',60, '','D000001');
        $this->insertLink('SD000007', 'Braemar Hill / North Point Midlevel', '寶馬山 / 北角半山',70, '','D000001');
        $this->insertLink('SD000008', 'Jardine Lookout / Tai Hang', '渣甸山 / 大坑',80, '','D000001');
        $this->insertLink('SD000009', 'Happy Valley / Mid Level East', '跑馬地 / 東半山',90, '','D000001');
        $this->insertLink('SD000010', 'Wan Chai / Causeway Bay', '灣仔 / 銅鑼灣',100, '','D000001');
        $this->insertLink('SD000011', 'Tin Hau', '天后',110, '','D000001');
        $this->insertLink('SD000012', 'Central Mid-Levels / Admiralty', '中半山 / 金鐘',120, '','D000001');
        $this->insertLink('SD000013', 'Sheung Wan / Central', '中上環',130, '','D000001');
        $this->insertLink('SD000014', 'Hong Kong West', '港島西',140, '','D000001');
        $this->insertLink('SD000015', 'Western Mid-Levels', '西半山',150, '','D000001');
        $this->insertLink('SD000016', 'The Peak', '山頂',170, '','D000001');
        $this->insertLink('SD000017', 'Residencebel-Air / Pokfulam', '貝沙灣 / 薄扶林',180, '','D000001');
        $this->insertLink('SD000018', 'Ap Lei Chau', '鴨脷洲',190, '','D000001');
        $this->insertLink('SD000019', 'Aberdeen / Wong Chuk Hang', '香港仔 / 黃竹坑',200, '','D000001');
        $this->insertLink('SD000020', 'Repulse Bay / Shouson Hill', '淺水灣 / 壽臣山',210, '','D000001');
        $this->insertLink('SD000021', 'Tai Tam / Shek O', '大潭 / 石澳',220, '','D000001');
        $this->insertLink('SD000022', 'Stanley', '赤柱',230, '','D000001');

        // Kowloon        
        $this->insertLink('SD000023', 'Tsim Sha Tsui', '尖沙咀',240, '', 'D000002');
        $this->insertLink('SD000024', 'Kowloon Station', '九龍站',250, '', 'D000002');
        $this->insertLink('SD000025', 'Yau Ma Tei', '油麻地',260, '', 'D000002');
        $this->insertLink('SD000026', 'Kingspark', '京士柏',270, '', 'D000002');
        $this->insertLink('SD000027', 'Mongkok', '旺角',280, '', 'D000002');
        $this->insertLink('SD000028', 'Tai Kok Tsui', '大角咀',290, '', 'D000002');
        $this->insertLink('SD000029', 'Olympic', '奧運',300, '', 'D000002');
        $this->insertLink('SD000030', 'Lai Chi Kok', '荔枝角',310, '', 'D000002');
        $this->insertLink('SD000031', 'Mei Foo', '美孚',320, '', 'D000002');
        $this->insertLink('SD000032', 'Cheung Sha Wan / Sham Shui Po', '長沙灣 / 深水埗',330, '', 'D000002');
        $this->insertLink('SD000033', 'Yau Yat Chuen', '又一村',340, '', 'D000002');
        $this->insertLink('SD000034', 'Kowloon Tong / Beacon Hill', '九龍塘 / 筆架山',350, '', 'D000002');
        $this->insertLink('SD000035', 'Ho Man Tin', '何文田',360, '', 'D000002');
        $this->insertLink('SD000036', 'Hung Hom', '紅磡',370, '', 'D000002');
        $this->insertLink('SD000037', 'To Kwa Wan', '土瓜灣',380, '', 'D000002');
        $this->insertLink('SD000038', 'Kai Tak', '啟德',390, '', 'D000002');
        $this->insertLink('SD000039', 'Kowloon City', '九龍城',400, '', 'D000002');
        $this->insertLink('SD000040', 'Wong Tai Sin / Lok Fu', '黃大仙 / 樂富',410, '', 'D000002');
        $this->insertLink('SD000041', 'Diamond Hill / San Po Kong / Ngau Chi Wan', '鑽石山 / 新蒲崗 / 牛池灣',420, '', 'D000002');
        $this->insertLink('SD000042', 'Kowloon Bay', '九龍灣',430, '', 'D000002');
        $this->insertLink('SD000043', 'Kwun Tong', '觀塘',440, '', 'D000002');
        $this->insertLink('SD000044', 'Lam Tin / Yau Tong', '藍田 / 油塘',450, '', 'D000002');
        $this->insertLink('SD000045', 'Lohas Park', '康城',470, '', 'D000002');
        $this->insertLink('SD000046', 'Tiu Keng Leng', '調景嶺',480, '', 'D000002');
        $this->insertLink('SD000047', 'Hang Hau', '坑口',490, '', 'D000002');
        $this->insertLink('SD000048', 'Po Lam / Tseung Kwan O Station', '寶琳 / 將軍澳站',500, '', 'D000002');

        // New Territory
        $this->insertLink('SD000049', 'Sai Kung / Clear Water Bay', '西貢 / 清水灣',510, '', 'D000003');
        $this->insertLink('SD000050', 'Shatin', '沙田',520, '', 'D000003');
        $this->insertLink('SD000051', 'Kau To Shan / Fotan', '九肚山 / 火炭',520, '', 'D000003');
        $this->insertLink('SD000052', 'Ma On Shan', '馬鞍山',540, '', 'D000003');
        $this->insertLink('SD000053', 'Tai Po', '大埔',550, '', 'D000003');
        $this->insertLink('SD000054', 'North', '新界北',560, '', 'D000003');
        $this->insertLink('SD000055', 'Sheung Shui / Fanling', '上水 / 粉嶺',570, '', 'D000003');
        $this->insertLink('SD000056', 'Hung Shui Kiu', '洪水橋',580, '', 'D000003');
        $this->insertLink('SD000057', 'Fairview / Palm Springs / The Vineyard', '錦繡 / 加州 / 葡萄園',590, '', 'D000003');
        $this->insertLink('SD000058', 'Tin Shui Wai', '天水圍',600, '', 'D000003');
        $this->insertLink('SD000059', 'Yuen Long', '元朗',610, '', 'D000003');
        $this->insertLink('SD000060', 'Tuen Mun', '屯門',620, '', 'D000003');
        $this->insertLink('SD000061', 'Tsuen Wan', '荃灣',630, '', 'D000003');
        $this->insertLink('SD000062', 'Sham Tseng', '深井',640, '', 'D000003');
        $this->insertLink('SD000063', 'Ma Wan', '馬灣',650, '', 'D000003');
        $this->insertLink('SD000064', 'Kwai Chung', '葵涌',660, '', 'D000003');
        $this->insertLink('SD000065', 'Tsing Yi', '青衣',670, '', 'D000003');
        $this->insertLink('SD000066', 'Discovery Bay', '愉景灣',680, '', 'D000003');
        $this->insertLink('SD000067', 'Tung Chung', '東涌',690, '', 'D000003');
        $this->insertLink('SD000068', 'Lantau / Island', '大嶼山 / 離島',700, '', 'D000003');



    }
}
