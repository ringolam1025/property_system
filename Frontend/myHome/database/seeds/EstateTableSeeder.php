<?php

use Illuminate\Database\Seeder;

class EstateTableSeeder extends Seeder
{
    public function insertLink($estate_id, $cName, $eName, $c_street_name, $e_street_name, $developer, $first_sales_date, $status, $desc, $photo_src, $displayorder, $sub_district_id){
        DB::table('tbl_estate')->insert([
            'estate_id' => $estate_id,
            'estate_cName' => $cName, 
            'estate_eName' => $eName, 
            'estate_c_street_name' => $c_street_name, 
            'estate_e_street_name' => $e_street_name, 
            'estate_developer' => $developer, 
            'first_sales_date' => $first_sales_date, 
            'estate_status' => $status, 
            'estate_desc' => $desc, 
            'estate_photo_src' => $photo_src, 
            'displayorder' => $displayorder, 
            'sub_district_id' => $sub_district_id,
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
        $this->insertLink('E20000001','迎海','Double Cove','烏溪沙路8號','8 Wu Kai Sha Road','Harvest Development Limited Carley Limited','2015/01/01','on_sales','','','10','SD000052');
        $this->insertLink('E20000002','殷豪閣','Yukon Court','干德道2號','2 CONDUIT ROAD','New World Development Co. Limited','1990/11/01','on_sales','','','20','SD000015');
        $this->insertLink('E20000003','萬景峯','Vision City','楊屋道1號','1 YEUNG UK ROAD','SINO / URBAN RENEWAL AUTHORITY','2006/01/01','on_sales','','','30','SD000060');
        $this->insertLink('E20000004','日出康城','Lohas Park','康城路1號','1 LOHAS PARK ROAD','MTR Corporation','2001/01/01','on_sales','','','40','SD000045');
        $this->insertLink('E20000005','雅麗園','Alice Court','廣播道43號','43 Broadcast Drive','','1971/10/12','on_sales','','','50','SD000034');
        $this->insertLink('E20000006','藍灣半島','Island Resort','小西灣道28號','28 Siu Sai Wan Road','Sino','2001/04/11','on_sales','','','60','SD000001');
        $this->insertLink('E20000007','山翠苑','Shan Tsui Court','大潭道200號','200 Tai Tam Road','The Ha','1981/03/04','on_sales','','','70','SD000001');
        $this->insertLink('E20000008','杏花邨','Heng Fa Chuen','盛泰道100號','100 Shing Tai Road','MTR Corporation','1986/09/08','on_sales','','','80','SD000002');
        $this->insertLink('E20000009','形薈','Lime Gala','筲箕灣道393號','393 Shau Kei Wan Road','Sun Hung Kai','2018/08/14','on_sales','','','90','SD000003');
        $this->insertLink('E20000010','香島','Island Garden','柴灣道33號','33 Chai Wan Road','Nan Fung Group','2018/07/12','on_sales','','','100','SD000001');
        $this->insertLink('E20000011','柏匯','Parker33','成安街33號','33 Shing On Street','Henderson','2017/03/01','on_sales','','','110','SD000003');
        $this->insertLink('E20000012','太古城','Taikoo Shing','太古灣道11-17號','11-17 Taikoo Wan Road','Swire','1977/03/14','on_sales','','','120','SD000004');
        $this->insertLink('E20000013','海怡半島','South Horizons','海怡路18A號','18A South Horizon Drive','Hutchison Whampoa','1991/11/22','on_sales','','','130','SD000018');
        $this->insertLink('E20000014','康怡花園','Kornhill','康安街6-16號 ','6-16 Hong On Street ','Hang Lung','1985/12/19','on_sales','','','140','SD000005');
        $this->insertLink('E20000015','南豐新邨','Nan Fung Sun Chuen','基利路32-40號 ','32-40 Greig Road ','Nan Fung Group','1977/08/26','on_sales','','','150','SD000005');
        $this->insertLink('E20000016','城市花園','City Garden','電氣道233號','233 Electric Road','Cheung Kong Property','1982/12/31','on_sales','','','160','SD000006');
        $this->insertLink('E20000017','富澤花園','Fortress Garden','炮台山道32號','32 Fortress Hill Road','','1981/06/18','on_sales','','','170','SD000006');
        $this->insertLink('E20000018','賽西湖大廈','Braemar Hill Mansions','寶馬山道15-43號','15-43 Braemar Hill Road','Cheung Kong Property','1978/02/13','on_sales','','','180','SD000007');
        $this->insertLink('E20000019','寶馬山花園','Pacific Palisades','寶馬山道1號','1 Braemar Hill Road','Sino','1991/04/08','on_sales','','','190','SD000007');
        $this->insertLink('E20000020','皇第','Dukes Place','白建時道47號','47 Perkins Road','Asia Standard / Couture Homes / Grosvenor','2020/01/11','on_sales','','','200','SD000008');
        $this->insertLink('E20000021','渣甸山名門','The Legend At Jardine\'S Lookout','大坑徑23號','23 Tai Hang Drive','Cheung Kong Property','2006/11/24','on_sales','','','210','SD000008');
        $this->insertLink('E20000022','慧景臺','Grandview Tower','堅尼地道128-130號','128-130 Kennedy Road','Henderson','1978/02/01','on_sales','','','220','SD000009');
        $this->insertLink('E20000023','禮頓山','The Leighton Hill','樂活道2B號','2B Broadwood Road','Sun Hung Kai','2002/03/22','on_sales','','','230','SD000009');
        $this->insertLink('E20000024','囍滙','The Avenue','太原街33號','33 Tai Yuen Street','Grand Site Dev. / Ura','2014/03/31','on_sales','','','240','SD000010');
        $this->insertLink('E20000025','尚翹峰','The Zenith',' 灣仔道3號','3 Wan Chai Road','Chinese Estates','2005/06/16','on_sales','','','250','SD000010');
        $this->insertLink('E20000026','維峯‧浚匯','The Consonance','木星街23號','23 Jupiter Street','Henderson','2019/04/04','on_sales','','','260','SD000006');
        $this->insertLink('E20000027','柏傲山','The Pavilia Hill','天后廟道18A號','18A Tin Hau Temple Road','New World ','2015/12/09','on_sales','','','270','SD000011');
        $this->insertLink('E20000028','會景閣','Convention Plaza','港灣道1號','1 Harbour Road','New World ','1990/03/07','on_sales','','','280','SD000012');
        $this->insertLink('E20000029','地利根德閣','Tregunter','地利根德里14號','14 Tregunter Path','','1981/06/10','on_sales','','','290','SD000012');
        $this->insertLink('E20000030','帝后華庭','QueenS Terrace','皇后街1號','1 Queen Street','New World / Cheung Kong / Urban Renewal Authority','2002/08/16','on_sales','','','300','SD000012');
        $this->insertLink('E20000031','聚賢居','Centrestage','荷李活道108號','108 Hollywood Road','Henderson','2006/06/29','on_sales','','','310','SD000012');
        $this->insertLink('E20000032','15 Western Street','15 Western Street','西邊街15號','15 Western Street','Vanke','2020/01/10','on_sales','','','320','SD000013');
        $this->insertLink('E20000033','寶翠園','The BelcherS','薄扶林道89號','89 Pok Fu Lam Road','Sun Hung Kai / Shun Tak / Lch / New World','2000/12/29','on_sales','','','330','SD000014');
        $this->insertLink('E20000034','The Richmond','The Richmond','羅便臣道62C號','62C Robinson Road','Henderson','2020/01/21','on_sales','','','340','SD000012');
        $this->insertLink('E20000035','樂信臺','Robinson Heights','羅便臣道8號','8 Robinson Road','Cheung Kong ','1989/12/21','on_sales','','','350','SD000012');
        $this->insertLink('E20000036','倚巒','Severn 8','施勳道8號','8 Severn Road','Sun Hung Kai','2005/08/25','on_sales','','','360','SD000016');
        $this->insertLink('E20000037','La Hacienda','La Hacienda','加列山道27-31號','27-31 Mount Kellett Road','Nan Fung Group','1949/04/05','on_sales','','','370','SD000016');
        $this->insertLink('E20000038','貝沙灣','Residence Bel-Air','貝沙山道','Bel-Air Peak Avenue','Pacific Century','2004/06/17','on_sales','','','380','SD000017');
        $this->insertLink('E20000039','碧瑤灣','Baguio Villa','域多利道555號','555 Victoria Road','New World ','1976/01/24','on_sales','','','390','SD000017');
        $this->insertLink('E20000040','南灣','Larvotto','鴨脷洲海旁道8號','8 Ap Lei Chau Praya Road','Sun Hung Kai/ Kerry / Paliburg','2010/12/07','on_sales','','','400','SD000018');
        $this->insertLink('E20000041','深灣軒','Sham Wan Towers','鴨脷洲徑3號','3 Ap Lei Chau Drive','Sun Hung Kai','2004/03/31','on_sales','','','410','SD000018');
        $this->insertLink('E20000042','深灣9號','Marinella','惠福道9號','9 Welfare Road','K Wah / Sino / Nan Fung Group','2012/04/25','on_sales','','','420','SD000019');
        $this->insertLink('E20000043','登峰．南岸','South Coast','登豐街1號','1 Tang Fung Street','Kln Dev','2016/04/11','on_sales','','','430','SD000019');
        $this->insertLink('E20000044','華景園','Grand Garden','南灣道61號','61 South Bay Road','Nan Fung Group','1986/12/10','on_sales','','','440','SD000020');
        $this->insertLink('E20000045','嘉麟閣','Ruby Court','南灣道55號','55 South Bay Road','Star','1987/05/21','on_sales','','','450','SD000020');
        $this->insertLink('E20000046','陽明山莊','Hong Kong Parkview','大潭水塘道88號','88 Tai Tam Reservoir Road','Chyau Fwu','1989/11/13','on_sales','','','460','SD000021');
        $this->insertLink('E20000047','浪琴園','Pacific View','大潭道38號','38 Tai Tam Road','Sun Hung Kai','1991/01/25','on_sales','','','470','SD000021');
        $this->insertLink('E20000048','旭逸居','Stanford Villa','赤柱村道7號','7 Stanley Village Road','','1995/05/15','on_sales','','','480','SD000022');
        $this->insertLink('E20000049','龍德苑','Lung Tak Court','環角道52號','52 Cape Road','The Ha','2000/08/08','on_sales','','','490','SD000022');
        $this->insertLink('E20000050','港景峯','The Victoria Towers','廣東道188號','188 Canton Road','Cheung Kong Property','2002/09/23','on_sales','','','500','SD000023');
        $this->insertLink('E20000051','凱譽','Harbour Pinnacle','棉登徑8號','8 Minden Avenue','Henderson','2002/05/29','on_sales','','','510','SD000023');
        $this->insertLink('E20000052','擎天半島','Sorrento','柯士甸道西1號','1 Austin Road West','The Wharf / Mtr','2002/10/30','on_sales','','','520','SD000024');
        $this->insertLink('E20000053','御金．國峯','The Coronation','友翔道1號','1 Yau Cheung Road','Sino / Nan Fung Group / K. Wah / Chinese Estates','2012/08/21','on_sales','','','530','SD000024');
        $this->insertLink('E20000054','窩打老道8號','8 Waterloo Road','窩打老道8號','8 Waterloo Road','Sun Hung Kai','2004/06/09','on_sales','','','540','SD000025');
        $this->insertLink('E20000055','君頤峰','Parc Palais','衛理道18號','18 Wylie Road','New World / Sino / The Wharf / Chinese Estates','2004/02/13','on_sales','','','550','SD000026');
        $this->insertLink('E20000056','Skypark','Skypark','奶路臣街17號','17 Nelson Street','New World / Ura','2016/10/14','on_sales','','','560','SD000027');
        $this->insertLink('E20000057','麥花臣匯','Macpherson Place','奶路臣街38號','38 Nelson Stree','Kln Dev','2012/12/31','on_sales','','','570','SD000027');
        $this->insertLink('E20000058','港灣豪庭','Metro Harbour View','福利街8號','8 Fuk Lee Street','Henderson / Hk F','2002/12/07','on_sales','','','580','SD000028');
        $this->insertLink('E20000059','利奧坊．曉岸','Eltanin．Square Mile','利得街11號','11 LI Tak Street','Henderson','2017/05/25','on_sales','','','590','SD000028');
        $this->insertLink('E20000060','浪澄灣','The Long Beach','海輝道8號','8 Hoi Fai Road','Hang Lung Group','2004/09/09','on_sales','','','600','SD000029');
        $this->insertLink('E20000061','維港灣','Island Harbourview','海輝道11號','11 Hoi Fai Road','','2000/02/03','on_sales','','','610','SD000029');
        $this->insertLink('E20000062','碧海藍天','Aquamarine','深盛路8號','8 Sham Shing Road','Hang Lung Group','2003/12/15','on_sales','','','620','SD000030');
        $this->insertLink('E20000063','宇晴軒','The Pacifica','深盛路9號','9 Sham Shing Road','Sun Hung Kai / Cheung Kong','2005/02/08','on_sales','','','630','SD000030');
        $this->insertLink('E20000064','美孚新邨','Mei Foo Sun Chuen','百老匯街12號','12 Broadway','New World','1968/10/09','on_sales','','','640','SD000031');
        $this->insertLink('E20000065','曼克頓山','Manhattan Hill','寶輪街1號','1 Po Lun Street','Sun Hung Kai','2006/12/12','on_sales','','','650','SD000031');
        $this->insertLink('E20000066','West Park','West Park','通州街256號','256 Tung Chau Street','Hanison Construction','2020/01/20','on_sales','','','660','SD000032');
        $this->insertLink('E20000067','恆大．睿峰','The Vertex','東京街29號','29 Tonkin Street','China Evergrande','2019/12/17','on_sales','','','670','SD000032');
        $this->insertLink('E20000068','緹山','Mont Rouge','龍駒道9號','9 Lung Kui Road','Kerry','2019/04/06','on_sales','','','680','SD000032');
        $this->insertLink('E20000069','又一居','Parc Oasis',' 達之路35-51號',' 35-51 Tat Chee Avenue','Wheelock','1992/10/16','on_sales','','','690','SD000033');
        $this->insertLink('E20000070','晟林','La Salle Residence','喇沙利道6號','6 La Salle Road','Fullsun','2019/07/26','on_sales','','','700','SD000035');
        $this->insertLink('E20000071','喇沙滙','La Maison De La Salle','喇沙利道25號','25 La Salle Road','','2015/11/02','on_sales','','','710','SD000034');
        $this->insertLink('E20000072','傲玟','Grand Homm','常盛街17號','17 Sheung Shing Street','Goldin','2919/10/19','on_sales','','','720','SD000035');
        $this->insertLink('E20000073','啟岸','The Vantage','馬頭圍道63號','63 Ma Tau Wai Road','Henderson','2019/03/09','on_sales','','','730','SD000036');
        $this->insertLink('E20000074','黃埔花園','Whampoa Garden','德康街3號','3 Tak Hong Street','Hutchison Whampoa','1985/12/05','on_sales','','','740','SD000036');
        $this->insertLink('E20000075','瑧尚','Artisan Garden','九龍城道68號','68 Kowloon City Road','New World','2019/03/23','on_sales','','','750','SD000039');
        $this->insertLink('E20000076','嘉峯匯','K.Summit','沐泰街9號','9 Muk Tai Street','K. Wah','2019/12/07','on_sales','','','760','SD000038');
        $this->insertLink('E20000077','AVA 55','AVA 55','啟德道55號','55 Kai Tak Road','Maxtech','2019/05/28','on_sales','','','770','SD000039');
        $this->insertLink('E20000078','豪門','Le Billionnaire','沙浦道46號','46 Sa Po Road','Sunnytact / Chime','2006/12/29','on_sales','','','780','SD000039');
        $this->insertLink('E20000079','翠竹花園','Tsui Chuk Garden','翠竹街8號','8 Chui Chuk Street','The Ha / Asunaro Aoki Construction','1989/09/21','on_sales','','','790','SD000040');
        $this->insertLink('E20000080','啟德花園','Kai Tak Garden','彩虹道121號','121 Choi Hung Road','Hkhs','1998/12/01','on_sales','','','800','SD000040');
        $this->insertLink('E20000081','峻弦','Aria','豐盛街51號','51 Fung Shing Street','Sun Hung Kai','2010/09/17','on_sales','','','810','SD000041');
        $this->insertLink('E20000082','譽．港灣','The Latitude','太子道東638號','638 Prince Edward Road East','Sun Hung Kai','2010/09/27','on_sales','','','820','SD000041');
        $this->insertLink('E20000083','德福花園','Telford Gardens','偉業街33號','33 Wai Yip Street','Hopewell / Hang Lung / Mtr','1980/08/18','on_sales','','','830','SD000042');
        $this->insertLink('E20000084','觀月．樺峯','Park Metropolitan','月華街8號','8 Yuet Wah Street','Sino / Ura','2014/07/08','on_sales','','','840','SD000043');
        $this->insertLink('E20000085','曦臺','Maya',' 四山街15號','15 Sze Shan Street','Wang On Properties / Cifi Group','2019/03/19','on_sales','','','850','SD000044');
        $this->insertLink('E20000086','Ocean Marini','Ocean Marini','康城路1號','1 Lohas Park Road','Wheelock / Mtr','2020/03/14','on_sales','','','860','SD000048');
        $this->insertLink('E20000087','維景灣畔','Ocean Shores','澳景路88號','88 O King Road','Swire Properties / Sun Hung Kai','2000/12/20','on_sales','','','870','SD000046');
        $this->insertLink('E20000088','新寶城','La Cite Noble','銀澳路1號','1 Ngan O Road','Henderson','1999/05/19','on_sales','','','880','SD000047');
        $this->insertLink('E20000089','天晉','The Wings','唐賢街9號','9 Tong Yin Street','Sun Hung Kai','2011/08/31','on_sales','','','890','SD000048');
        $this->insertLink('E20000090','133 Portofino','133 Portofino','康健路133號','133 Hong Kin Road','Sino','2020/02/09','on_sales','','','900','SD000049');
        $this->insertLink('E20000091','沙田第一城','City One Shatin','樂城街1,4,9號','1,4,9 Lok Shing Street','Henderson / New World / Ck Asset / Sun Hung Kai','1980/10/01','on_sales','','','910','SD000050');
        $this->insertLink('E20000092','御龍山','The Palazzo','樂景街28號','28 Lok King Street','Sino / Mtr','2008/12/12','on_sales','','','920','SD000051');
        $this->insertLink('E20000093','峻源','The Entrance','落禾沙里1號','1 Lok Wo Sha Lane','Citic Pacific','2019/09/14','on_sales','','','930','SD000052');
        $this->insertLink('E20000094','海日灣II','Centra Horizon','創新路18號','18 Chong San Road','Billion Dev.','2019/04/27','on_sales','','','940','SD000053');
        $this->insertLink('E20000095','數碼都域','Cyber Domaine','塘坑','Tong Hang','Famebo Dev.','2009/08/04','on_sales','','','950','SD000006');
        $this->insertLink('E20000096','天巒','Valais','古洞路28,33號','28,33 Kwu Tung Road','Sun Hung Kai','2009/12/30','on_sales','','','960','SD000055');
        $this->insertLink('E20000097','珀爵','Manor Parc','丹桂村里3號','3 Tan Kwai Tsuen Lane','Far East Consortium','2018/12/28','on_sales','','','970','SD000059');
        $this->insertLink('E20000098','栢慧豪園','Central Park Towers','天恩路2號','2 Tin Yan Road','Cheung Kong','2007/11/08','on_sales','','','980','SD000058');
        $this->insertLink('E20000099','碧堤半島','Bellagio','青山公路深井段33號','33 Castle Peak Road Sham Tseng','The Wharf','2002/05/30','on_sales','','','990','SD000062');
        $this->insertLink('E20000100','華景山莊','Wonderland Villas','華景山路9號','9 Wah King Hill Road','','1984/10/18','on_sales','','','1000','SD000064');
        $this->insertLink('E20000101','屯門市廣場','Tuen Mun Town Plaza','屯隆街3號','3 Tuen Lung Street','Sino','1987/10/30','on_sales','','','1010','SD000060');
        $this->insertLink('E20000102','環宇海灣','City Point','永順街48號','48 Wing Shun Street','Cheung Kong / Mtr','2014/09/19','on_sales','','','1020','SD000061');
        $this->insertLink('E20000103','昇薈','The Visionary','迎東路1-5號','1-5 Ying Tung Street','Nan Fung Group','2015/09/15','on_sales','','','1030','SD000067');
        $this->insertLink('E20000104','明翹匯','The Grand Marine','細山路18號','18 Sai Shan Road','Grand Ming Group','2019/11/01','on_sales','','','1040','SD000065');
        $this->insertLink('E20000105','Whitesands','Whitesands','嶼南道160號','160 South Lantau Road','Swire Properties','2015/02/10','on_sales','','','1050','SD000068');
    }
}

