<?php

use Illuminate\Database\Seeder;

class PhaseTableSeeder extends Seeder
{
    public function insertLink($phase_id, $estate_id, $cName, $eName, $complate_date, $c_street_name, $e_street_name, $latitude, $longitude, $displayorder, $photo_src){
        DB::table('tbl_phase')->insert([
            'phase_id' => $phase_id,
            'estate_id' => $estate_id,
            'phase_cName' => $cName,
            'phase_eName' => $eName,
            'phase_complate_date' => $complate_date,
            'phase_c_street_name' => $c_street_name,
            'phase_e_street_name' => $e_street_name,
            'phase_latitude' => $latitude ,
            'phase_longitude' => $longitude,
            'displayorder' => $displayorder,
            'phase_photo_src' => $photo_src,
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
        $this->insertLink('PS20000001','E20000001','迎海','Double Cove (Phase 1)','2016/07/01','烏溪沙路8號','8 Wu Kai Sha Road',22.4318607,114.2389032,'10','');
        $this->insertLink('PS20000002','E20000001','迎海．星灣 (第二期)','Double Cove Starview (Phase 2)','2016/07/01','烏溪沙路9號','9 Wu Kai Sha Road',22.4308804,114.2384624,'20','');
        $this->insertLink('PS20000003','E20000001','迎海．星灣御 (第三期)','Double Cove Starview Prime (Phase 3)','2016/07/01','烏溪沙路10號','10 Wu Kai Sha Road',22.4308804,114.2384624,'30','');
        $this->insertLink('PS20000004','E20000001','迎海．駿岸 (第四期)','Double Cove Grandview (Phase 4)','2016/07/01','烏溪沙路11號','11 Wu Kai Sha Road',22.4308804,114.2384624,'40','');
        $this->insertLink('PS20000005','E20000001','迎海．御峰 (第五期)','Double Cove Summit (Phase 5)','2016/07/01','烏溪沙路12號','12 Wu Kai Sha Road',22.4308804,114.2384624,'50','');
        $this->insertLink('PS20000006','E20000002','殷豪閣','Yukon Court','1991/01/01','干德道2號','2 Conduit Road',22.278428,114.1500786,'60','');
        $this->insertLink('PS20000007','E20000003','萬景峯','Vision City','2007/01/01','楊屋道1號','1 Yeung Uk Road',22.3695129,114.111477,'70','');
        $this->insertLink('PS20000008','E20000004','日出康城','Lohas Park (Phase 1)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'80','');
        $this->insertLink('PS20000009','E20000004','領都 (日出康城2A期)','Le Prestige (Lohas Park Phase 2A)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'90','');
        $this->insertLink('PS20000010','E20000004','領峯 (日出康城2B期)','Le Prime (Lohas Park Phase 2B)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'100','');
        $this->insertLink('PS20000011','E20000004','領凱 (日出康城2C期)','La Splendeur (Lohas Park Phase 2C)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'110','');
        $this->insertLink('PS20000012','E20000004','緻藍天 (日出康城3期)','Hemera (Lohas Park Phase 3)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'120','');
        $this->insertLink('PS20000013','E20000004','晉海(日出康城4A期)','Wings At Sea(Lohas Park Phase 4A)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'130','');
        $this->insertLink('PS20000014','E20000004','晉海II(日出康城4B期)','Wings At Sea II(Lohas Park Phase 4B)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'140','');
        $this->insertLink('PS20000015','E20000004','Malibu(日出康城5A期)','Malibu(Lohas Park Phase 5A)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'150','');
        $this->insertLink('PS20000016','E20000004','LP6(日出康城6期)','LP6(Lohas Park Phase 6)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'160','');
        $this->insertLink('PS20000017','E20000004','Montara(日出康城7A期)','Montara(Lohas Park Phase 7A)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'170','');
        $this->insertLink('PS20000018','E20000004','Grand Montara (日出康城7B期)','Grand Montara (Lohas Park Phase 7B)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'180','');
        $this->insertLink('PS20000019','E20000004','Marini (日出康城9A期)','Marini (Lohas Park Phase 9A)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'190','');
        $this->insertLink('PS20000020','E20000004','Grand Marini (日出康城9B期)','Grand Marini (Lohas Park Phase 9B)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'200','');
        $this->insertLink('PS20000021','E20000004','Ocean Marini (日出康城9B期)','Ocean Marini (Lohas Park Phase 9C)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'210','');
        $this->insertLink('PS20000022','E20000004','Sea To Sky (日出康城8期)','Sea To Sky (Lohas Park Phase 8)','2002/10/30','康城路1號','1 Lohase Park Road',22.2968639,114.2677169,'220','');
        $this->insertLink('PS20000023','E20000005','雅麗園','Alice Court','1971/10/12','廣播道43號','43 Broadcast Drive',22.3426998,114.1790884,'230','');
        $this->insertLink('PS20000024','E20000006','藍灣半島','Island Resort','2001/04/11','小西灣道28號','28 Siu Sai Wan Road',22.2660309,114.249497,'240','');
        $this->insertLink('PS20000025','E20000007','山翠苑','Shan Tsui Court','1981/03/04','大潭道200號','200 Tai Tam Road',22.2698289,114.231202,'250','');
        $this->insertLink('PS20000026','E20000008','杏花園 (杏花邨)','Heng Fa Villa (Heng Fa Chuen)','1990/03/13','盛泰道100號','100 Shing Tai Road',22.2754375,114.2369486,'260','');
        $this->insertLink('PS20000027','E20000009','形薈','Lime Gala','2018/08/14','筲箕灣道393號','393 Shau Kei Wan Road',22.2769234,114.226412,'270','');
        $this->insertLink('PS20000028','E20000010','香島','Island Garden','2018/07/12','柴灣道33號','33 Chai Wan Road',22.2750116,114.2290336,'280','');
        $this->insertLink('PS20000029','E20000011','柏匯','Parker33','2017/03/01','成安街33號','33 Shing On Street',22.2814271,114.2187483,'290','');
        $this->insertLink('PS20000030','E20000012','安盛台 (太古城)','On Shing Terrace (Taikoo Shing )','1980/03/10','太裕路7號','7 Tai Yue Avenue',22.2869038,114.2119413,'300','');
        $this->insertLink('PS20000031','E20000012','金殿台 (太古城)',' Kam Din Terrace (Taikoo Shing )','1980/01/11','太古城道31號','31 Taikoo Shing Road',22.286012,114.2133113,'310','');
        $this->insertLink('PS20000032','E20000012','星輝台 (太古城)','Sing Fai Terrace (Taikoo Shing )','1983/06/13','太榮路1號','1 Tai Wing Avenue',22.2867325,114.2175838,'320','');
        $this->insertLink('PS20000033','E20000012',' 海天花園 (太古城)','Horizon Gardens (Taikoo Shing )','1989/05/25','太豐路2號','2 Tai Fung Avenu',22.2856009,114.217226,'330','');
        $this->insertLink('PS20000034','E20000012','海景花園(西) (太古城)','Harbour View Gardens (West) (Taikoo Shing )','1983/06/22','太古灣道26號','26 Taikoo Wan Road',22.2876414,114.2118252,'340','');
        $this->insertLink('PS20000035','E20000012','海景花園(東) (太古城)','Harbour View Gardens (East) (Taikoo Shing )','1983/08/04','太古灣道10號','10 Taikoo Wan Road',22.2876351,114.2162835,'350','');
        $this->insertLink('PS20000036','E20000012','高山台 (太古城)','Kao Shan Terrace (Taikoo Shing )','1977/11/15','太古城道11號','11 Taikoo Shing Road',22.286005,114.2183268,'360','');
        $this->insertLink('PS20000037','E20000012','翠湖台 (太古城)','Tsui Woo Terrace (Taikoo Shing )','1977/04/13','太古城道2號','2 Taikoo Shing Road',22.284593,114.220542,'370','');
        $this->insertLink('PS20000038','E20000012','觀海台 (太古城)','Kwun Hoi Terrace (Taikoo Shing )','1985/04/04','太榮路2號','2 Tai Wing Avenue',22.286401,114.220245,'380','');
        $this->insertLink('PS20000039','E20000013','海怡半島 1期','South Horizons Phase 1','1991/11/22','海怡路1號','1 South Horizon Drive',22.24319,114.14857,'390','');
        $this->insertLink('PS20000040','E20000013','海怡半島 2期','South Horizons Phase 2','1992/10/30','海怡路7號','7 South Horizon Drive',22.24319,114.14857,'400','');
        $this->insertLink('PS20000041','E20000013','海怡半島 3期','South Horizons Phase 3','1993/12/20','海怡路17號','17 South Horizon Drive',22.24319,114.14857,'410','');
        $this->insertLink('PS20000042','E20000013','海怡半島 4期 (御庭園)','South Horizons Phase 4 (The Oasis)','1994/12/19','怡南路29號','29 Yi Nam Road',22.283957,114.192472,'420','');
        $this->insertLink('PS20000043','E20000014','康怡花園','Kornhill','1985/12/19','康安街6-16號 ','6-16 Hong On Street ',22.28388,114.215201,'430','');
        $this->insertLink('PS20000044','E20000015','南豐新邨','Nan Fung Sun Chuen','1977/08/26','基利路32-40號 ','32-40 Greig Road ',22.283067,114.213593,'440','');
        $this->insertLink('PS20000045','E20000016','城市花園 1期','City Garden Phase 1','1982/12/31','電氣道233號','233 Electric Road',22.286372,114.19126,'450','');
        $this->insertLink('PS20000046','E20000016','城市花園 2期','City Garden Phase 2','1986/05/28','電氣道233號','233 Electric Road',22.286372,114.19126,'460','');
        $this->insertLink('PS20000047','E20000017','富澤花園','Fortress Garden','1981/06/18','炮台山道32號','32 Fortress Hill Road',22.288625,114.194955,'470','');
        $this->insertLink('PS20000048','E20000018','賽西湖大廈','Braemar Hill Mansions','1978/02/13','寶馬山道15-43號','15-43 Braemar Hill Road',22.287693,114.203127,'480','');
        $this->insertLink('PS20000049','E20000019','寶馬山花園 1期','Pacific Palisades Phase 1','1991/04/08','寶馬山道1號','1 Braemar Hill Road',22.287693,114.203127,'490','');
        $this->insertLink('PS20000050','E20000019','寶馬山花園 2期','Pacific Palisades Phase 2','1991/04/08','寶馬山道1號','1 Braemar Hill Road',22.287693,114.203127,'500','');
        $this->insertLink('PS20000051','E20000020','皇第','Dukes Place','2020/01/11','白建時道47號','47 Perkins Road',22.307696,114.234406,'510','');
        $this->insertLink('PS20000052','E20000021','渣甸山名門','The Legend At JardineS Lookout','2006/11/24','大坑徑23號','23 Tai Hang Drive',22.409242,114.222788,'520','');
        $this->insertLink('PS20000053','E20000022','慧景臺','Grandview Tower','1978/02/01','堅尼地道128-130號','128-130 Kennedy Road',22.274893,114.169119,'530','');
        $this->insertLink('PS20000054','E20000023','禮頓山','The Leighton Hill','2002/03/22','樂活道2B號','2B Broadwood Road',22.27275,114.186209,'540','');
        $this->insertLink('PS20000055','E20000024','囍滙 第一期','The Avenue Phase 1','2014/03/31','皇后大道東200號','200 QueenS Road East',22.275193,114.17214,'550','');
        $this->insertLink('PS20000056','E20000024','囍滙 第二期','The Avenue Phase 2','2015/04/21','皇后大道東200號','200 QueenS Road East',22.275193,114.17214,'560','');
        $this->insertLink('PS20000057','E20000025','尚翹峰 1期','The Zenith Phase 1','2005/06/16','灣仔道3號','3 Wan Chai Road',22.277019,114.176657,'570','');
        $this->insertLink('PS20000058','E20000026','維峯‧浚匯','The Consonance','2020/08/31','木星街23號','23 Jupiter Street',22.286246,114.192034,'580','');
        $this->insertLink('PS20000059','E20000027','柏傲山','The Pavilia Hill','2015/12/09','天后廟道18A號','18A Tin Hau Temple Road',22.282353,114.193351,'590','');
        $this->insertLink('PS20000060','E20000028','會景閣','Convention Plaza','1990/03/07','港灣道1號','1 Harbour Road',22.280329,114.176896,'600','');
        $this->insertLink('PS20000061','E20000029','地利根德閣','Tregunter','1981/06/10','地利根德里14號','14 Tregunter Path',22.272594,114.153268,'610','');
        $this->insertLink('PS20000062','E20000030','帝后華庭','QueenS Terrace','2002/08/16','皇后街1號','1 Queen Street',22.2873199,114.144915,'620','');
        $this->insertLink('PS20000063','E20000031','聚賢居','Centrestage','2006/06/29','荷李活道108號','108 Hollywood Road',22.28559,114.1479,'630','');
        $this->insertLink('PS20000064','E20000032','15 Western Street','15 Western Street','2021/09/30','西邊街15號','15 Western Street',22.285828,114.140657,'640','');
        $this->insertLink('PS20000065','E20000033','寶翠園 1期','The BelcherS Phase 1','2000/12/29','薄扶林道89號','89 Pok Fu Lam Road',22.285038,114.133335,'650','');
        $this->insertLink('PS20000066','E20000033','寶翠園 2期','The BelcherS Phase 2','2001/12/11','薄扶林道89號','89 Pok Fu Lam Road',22.285038,114.133335,'660','');
        $this->insertLink('PS20000067','E20000034','The Richmond','The Richmond','2021/11/30','羅便臣道62C號','62C Robinson Road',22.282754,114.147291,'670','');
        $this->insertLink('PS20000068','E20000035','樂信臺','Robinson Heights','2989/12/21','羅便臣道8號','8 Robinson Road',22.279073,114.153416,'680','');
        $this->insertLink('PS20000069','E20000036','倚巒','Severn 8','2005/08/25','施勳道8號','8 Severn Road',22.279073,114.153416,'690','');
        $this->insertLink('PS20000070','E20000037','La Hacienda','La Hacienda','1949/04/05','加列山道27-31號','27-31 Mount Kellett Road',22.281127,114.176237,'700','');
        $this->insertLink('PS20000071','E20000038','貝沙灣 第一期','Residence Bel-Air Phase 1','2004/06/17','貝沙灣道28號','28 Bel-Air Avenue',22.296574,114.17497,'710','');
        $this->insertLink('PS20000072','E20000038','貝沙灣 二期 (南岸)','Residence Bel-Air Phase 2 (South Tower)','2004/12/10','貝沙灣道38號','38 Bel-Air Avenue',22.318493,114.18524,'720','');
        $this->insertLink('PS20000073','E20000038','貝沙灣 三期','Residence Bel-Air Phase 3','2005/06/29','貝沙徑1號','1 Bel-Air Rise',22.310923,114.175405,'730','');
        $this->insertLink('PS20000074','E20000038','貝沙灣 四期 (南灣)','Residence Bel-Air Phase 4  (Bel-Air On The Peak)','2005/12/02','貝沙山道68號','68 Bel-Air Peak Avenue',22.253387,114.132887,'740','');
        $this->insertLink('PS20000075','E20000038','貝沙灣 五期','Residence Bel-Air Phase 5 (Villa Bel-Air)','2007/05/29','貝沙山徑12號','12 Bel-Air Peak Rise',22.27053,114.126611,'750','');
        $this->insertLink('PS20000076','E20000038','貝沙灣 六期','Residence Bel-Air Phase 6 (Bel-Air No.8)','2008/08/01','貝沙山道8號','8 Bel-Air Peak Avenue',22.277931,114.184767,'760','');
        $this->insertLink('PS20000077','E20000039','碧瑤灣','Baguio Villa','1976/01/24','域多利道555號','555 Victoria Road',22.26217,114.134062,'770','');
        $this->insertLink('PS20000078','E20000040','南灣','Larvotto','2010/12/07','鴨脷洲海旁道8號','8 Ap Lei Chau Praya Road',22.24012,114.159707,'780','');
        $this->insertLink('PS20000079','E20000041','深灣軒','Sham Wan Towers','2004/03/31','鴨脷洲徑3號','3 Ap Lei Chau Drive',22.243828,114.158884,'790','');
        $this->insertLink('PS20000080','E20000042','深灣9號','Marinella','2012/04/25','惠福道9號','9 Welfare Road',22.245939,114.16358,'800','');
        $this->insertLink('PS20000081','E20000043','登峰．南岸','South Coast','2016/04/11','登豐街1號','1 Tang Fung Street',22.249323,114.14954,'810','');
        $this->insertLink('PS20000082','E20000044','華景園','Grand Garden','1986/12/10','南灣道61號','61 South Bay Road',22.227248,114.200738,'820','');
        $this->insertLink('PS20000083','E20000045','嘉麟閣','Ruby Court','1987/05/21','南灣道55號','55 South Bay Road',22.229119,114.199097,'830','');
        $this->insertLink('PS20000084','E20000046','陽明居 (陽明山莊)','Parkview Suites (Hong Kong Parkview)','1989/11/13','大潭水塘道88號','88 Tai Tam Reservoir Road',22.331609,114.171456,'840','');
        $this->insertLink('PS20000085','E20000046','山景園 (陽明山莊)','Parkview Court (Hong Kong Parkview)','1989/11/13','大潭水塘道88號','88 Tai Tam Reservoir Road',22.331609,114.171456,'850','');
        $this->insertLink('PS20000086','E20000046','凌雲閣 (陽明山莊)','Parkview Rise (Hong Kong Parkview)','1989/11/13','大潭水塘道88號','88 Tai Tam Reservoir Road',22.331609,114.171456,'860','');
        $this->insertLink('PS20000087','E20000046','環翠軒 (陽明山莊)','Parkview Crescent (Hong Kong Parkview)','1989/11/13','大潭水塘道88號','88 Tai Tam Reservoir Road',22.331609,114.171456,'870','');
        $this->insertLink('PS20000088','E20000046','涵碧苑 (陽明山莊)','Parkview Terrace (Hong Kong Parkview)','1989/11/13','大潭水塘道88號','88 Tai Tam Reservoir Road',22.331609,114.171456,'880','');
        $this->insertLink('PS20000089','E20000046','摘星樓 (陽明山莊)','Parkview Heights (Hong Kong Parkview)','1989/11/13','大潭水塘道88號','88 Tai Tam Reservoir Road',22.331609,114.171456,'890','');
        $this->insertLink('PS20000090','E20000046','眺景台 (陽明山莊)','Parkview Corner (Hong Kong Parkview)','1989/11/13','大潭水塘道88號','88 Tai Tam Reservoir Road',22.331609,114.171456,'900','');
        $this->insertLink('PS20000091','E20000047','浪琴園','Pacific View','1991/01/25','大潭道38號','38 Tai Tam Road',22.229727,114.21842,'910','');
        $this->insertLink('PS20000092','E20000048','旭逸居','Stanford Villa','1995/05/15','赤柱村道7號','7 Stanley Village Road',22.218714,114.212963,'920','');
        $this->insertLink('PS20000093','E20000049','龍德苑','Lung Tak Court','2000/08/08','環角道52號','52 Cape Road',22.219571,114.208217,'930','');
        $this->insertLink('PS20000094','E20000050','港景峯','The Victoria Towers','2002/09/23','廣東道188號','188 Canton Road',22.302381,114.16854,'940','');
        $this->insertLink('PS20000095','E20000051','凱譽','Harbour Pinnacle','2002/05/29','棉登徑8號','8 Minden Avenue',22.296614,114.174079,'950','');
        $this->insertLink('PS20000096','E20000052','擎天半島 1期','Sorrento Phase 1','2002/10/30','柯士甸道西1號','1 Austin Road West',22.30319,114.17434,'960','');
        $this->insertLink('PS20000097','E20000052','擎天半島 2期','Sorrento Phase 2','2003/10/16','柯士甸道西1號','1 Austin Road West',22.30319,114.17434,'970','');
        $this->insertLink('PS20000098','E20000053','御金．國峯','The Coronation','2012/08/21','1 Yau Cheung Road','1 Yau Cheung Road',22.370313,114.135103,'980','');
        $this->insertLink('PS20000099','E20000054','窩打老道8號','8 Waterloo Road','2004/06/09','窩打老道8號','8 Waterloo Road',22.31804,114.17487,'990','');
        $this->insertLink('PS20000100','E20000055','君頤峰','Parc Palais','2004/02/13','衛理道18號','18 Wylie Road',22.296945,114.173892,'1000','');
        $this->insertLink('PS20000101','E20000056','Skypark','Skypark','2016/10/14','奶路臣街17號','17 Nelson Street',22.317915,114.166667,'1010','');
        $this->insertLink('PS20000102','E20000057','麥花臣匯','Macpherson Place','2012/12/31','奶路臣街38號','38 Nelson Stree',22.31868,114.172744,'1020','');
        $this->insertLink('PS20000103','E20000058','港灣豪庭 一期','Metro Harbour View Phase 1','2002/12/07','福利街8號','8 Fuk Lee Street',22.324522,114.160743,'1030','');
        $this->insertLink('PS20000104','E20000058','港灣豪庭 二期','Metro Harbour View Phase 2','2003/08/06','福利街8號','8 Fuk Lee Street',22.324522,114.160743,'1040','');
        $this->insertLink('PS20000105','E20000059','利奧坊．曉岸','Eltanin．Square Mile','2017/05/25','利得街11號','11 LI Tak Street',22.320737,114.161028,'1050','');
        $this->insertLink('PS20000106','E20000060','浪澄灣','The Long Beach','2004/09/09','海輝道8號','8 Hoi Fai Road',22.277583,114.185377,'1060','');
        $this->insertLink('PS20000107','E20000061','維港灣','Island Harbourview','2000/02/03','海輝道11號','11 Hoi Fai Road',22.372522,114.107601,'1070','');
        $this->insertLink('PS20000108','E20000062','碧海藍天','Aquamarine','2003/12/15','深盛路8號','8 Sham Shing Road',22.332672,114.148463,'1080','');
        $this->insertLink('PS20000109','E20000063','宇晴軒 一期','The Pacifica Phase 1','2005/02/08','深盛路9號','9 Sham Shing Road',22.332672,114.148463,'1090','');
        $this->insertLink('PS20000110','E20000063','宇晴軒 二期','The Pacifica Phase 2','2005/02/08','深盛路9號','9 Sham Shing Road',22.332672,114.148463,'1100','');
        $this->insertLink('PS20000111','E20000064','美孚新邨 一期','Mei Foo Sun Chuen Phase I','1968/10/09','百老匯街12號','12 Broadway',22.334187,114.141865,'1110','');
        $this->insertLink('PS20000112','E20000064','美孚新邨 二期','Mei Foo Sun Chuen Phase II','1971/09/07','吉利徑1號','1 Glee Path',22.336829,114.139091,'1120','');
        $this->insertLink('PS20000113','E20000064','美孚新邨 三期','Mei Foo Sun Chuen Phase III','1972/05/17','吉利徑6號','6 Glee Path',22.336157,114.139801,'1130','');
        $this->insertLink('PS20000114','E20000064','美孚新邨 四期','Mei Foo Sun Chuen Phase IV','1973/01/11','百老匯街101號','101 Broadway',22.334187,114.141865,'1140','');
        $this->insertLink('PS20000115','E20000064','美孚新邨 五期','Mei Foo Sun Chuen Phase V','1972/11/06','蘭秀街11號','11 Nassau Street',22.294286,114.23581,'1150','');
        $this->insertLink('PS20000116','E20000064','美孚新邨 六期','Mei Foo Sun Chuen Phase VI','1974/02/22','恆柏街17號','17 Humbert Street',22.285765,114.140632,'1160','');
        $this->insertLink('PS20000117','E20000064','美孚新邨 七期','Mei Foo Sun Chuen Phase VII','1976/09/29','荔灣道12號','12 Lai Wan Road',22.337806,114.13807,'1170','');
        $this->insertLink('PS20000118','E20000064','美孚新邨 八期','Mei Foo Sun Chuen Phase II','1978/05/03','百老匯街100號','100 Broadway',22.334187,114.141865,'1180','');
        $this->insertLink('PS20000119','E20000065','曼克頓山','Manhattan Hill','2006/12/12','寶輪街1號','1 Po Lun Street',22.336113,114.143191,'1190','');
        $this->insertLink('PS20000120','E20000066','West Park','West Park','2020/01/20','通州街256號','256 Tung Chau Street',22.327658,114.158995,'1200','');
        $this->insertLink('PS20000121','E20000067','恆大．睿峰','The Vertex','2021/10/31','東京街29號','29 Tonkin Street',22.337714,114.160939,'1210','');
        $this->insertLink('PS20000122','E20000068','緹山','Mont Rouge','2019/12/31','龍駒道9號','9 Lung Kui Road',22.460954,114.005167,'1220','');
        $this->insertLink('PS20000123','E20000069','又一居','Parc Oasis','1992/10/16',' 達之路35-51號',' 35-51 Tat Chee Avenue',22.33568,114.175137,'1230','');
        $this->insertLink('PS20000124','E20000070','晟林','La Salle Residence','2022/02/20','喇沙利道6號','6 La Salle Road',22.327603,114.181462,'1240','');
        $this->insertLink('PS20000125','E20000071','喇沙滙','La Maison De La Salle','2021/03/04','喇沙利道25號','25 La Salle Road',22.327603,114.181462,'1250','');
        $this->insertLink('PS20000126','E20000072','傲玟','Grand Homm','2020/11/30','常盛街17號','17 Sheung Shing Street',22.318193,114.181076,'1260','');
        $this->insertLink('PS20000127','E20000073','啟岸','The Vantage','2021/03/31','馬頭圍道63號','63 Ma Tau Wai Road',22.30823,114.187888,'1270','');
        $this->insertLink('PS20000128','E20000074','黃埔花園 一期','Whampoa Garden Site 1','1985/12/05','必嘉街121號','121 Baker Street',22.332968,114.166047,'1280','');
        $this->insertLink('PS20000129','E20000074','黃埔花園 二期','Whampoa Garden Site 2','1986/09/24','船景街9號','9 Shung King Street',22.447707,114.164689,'1290','');
        $this->insertLink('PS20000130','E20000074','黃埔花園 三期','Whampoa Garden Site 3','1986/12/24','必嘉街120號','120 Baker Street',22.306052,114.169547,'1300','');
        $this->insertLink('PS20000131','E20000074','黃埔花園 四期','Whampoa Garden Site 4','1987/12/09','船景街7號','7 Shung King Street',22.447775,114.164757,'1310','');
        $this->insertLink('PS20000132','E20000074','黃埔花園 五期','Whampoa Garden Site 5','1987/12/24','德豐街7號','7 Tak Fung Street',22.3035,114.190343,'1320','');
        $this->insertLink('PS20000133','E20000074','黃埔花園 六期','Whampoa Garden Site 7','1988/12/19','德安街11號','11 Tak On Street',22.304021,114.19201,'1330','');
        $this->insertLink('PS20000134','E20000074','黃埔花園 九期','Whampoa Garden Site 9','1988/12/31','德豐街8號','8 Tak Fung Street',22.302536,114.190561,'1340','');
        $this->insertLink('PS20000135','E20000074','黃埔花園 十期','Whampoa Garden Site 10','1988/12/31','環海街8號','8 Wan Hoi Street',22.289012,114.211225,'1350','');
        $this->insertLink('PS20000136','E20000074','黃埔花園 十一期','Whampoa Garden Site 11','1989/12/27','德康街6號','6 Tak Hong Street',22.283596,114.221491,'1360','');
        $this->insertLink('PS20000137','E20000074','黃埔花園 十二期','Whampoa Garden Site 12','1991/01/09','德康街3號','3 Tak Hong Street',22.282079,114.216423,'1370','');
        $this->insertLink('PS20000138','E20000075','瑧尚','Artisan Garden','2021/03/31','九龍城道68號','68 Kowloon City Road',22.321377,114.19075,'1380','');
        $this->insertLink('PS20000139','E20000076','嘉峯匯','K.Summit','2021/11/30','沐泰街9號','9 Muk Tai Street',22.332578,114.204208,'1390','');
        $this->insertLink('PS20000140','E20000077','AVA 55','AVA 55','2019/05/28','啟德道55號','55 Kai Tak Road',22.373329,114.115471,'1400','');
        $this->insertLink('PS20000141','E20000078','豪門','Le Billionnaire','2006/12/29','沙浦道46號','46 Sa Po Road',22.330774,114.193054,'1410','');
        $this->insertLink('PS20000142','E20000079','翠竹花園','Tsui Chuk Garden','1989/09/21','翠竹街8號','8 Chui Chuk Street',22.453701,114.164702,'1420','');
        $this->insertLink('PS20000143','E20000080','啟德花園','Kai Tak Garden','1998/02/01','彩虹道121號','121 Choi Hung Road',22.337623,114.194492,'1430','');
        $this->insertLink('PS20000144','E20000081','峻弦','Aria','2010/09/17','豐盛街51號','51 Fung Shing Street',22.337916,114.213362,'1440','');
        $this->insertLink('PS20000145','E20000082','譽．港灣','The Latitude','2010/09/27','太子道東638號','638 Prince Edward Road East',22.333538,114.197003,'1450','');
        $this->insertLink('PS20000146','E20000083','德福花園','Telford Gardens','1980/08/18','偉業街33號','33 Wai Yip Street',22.312961,114.218152,'1460','');
        $this->insertLink('PS20000147','E20000084','觀月．樺峯','Park Metropolitan','2014/07/08','月華街8號','8 Yuet Wah Street',22.314998,114.226045,'1470','');
        $this->insertLink('PS20000148','E20000085','曦臺','Maya','2019/03/19',' 四山街15號','15 Sze Shan Street',22.293493,114.235824,'1480','');
        $this->insertLink('PS20000149','E20000086','Ocean Marini','Ocean Marini','2022/02/20','康城路1號','1 Lohas Park Road',22.440493,114.019712,'1490','');
        $this->insertLink('PS20000150','E20000087','維景灣畔 1期','Ocean Shores Phase 1','2000/12/20','澳景路88號','88 O King Road',22.378859,114.108617,'1500','');
        $this->insertLink('PS20000151','E20000087','維景灣畔 2期','Ocean Shores Phase 2','2001/12/05','澳景路88號','88 O King Road',22.378859,114.108617,'1510','');
        $this->insertLink('PS20000152','E20000087','維景灣畔 3期','Ocean Shores Phase 3','2003/05/29','澳景路88號','88 O King Road',22.378859,114.108617,'1520','');
        $this->insertLink('PS20000153','E20000088','新寶城','La Cite Noble','1999/05/19','銀澳路1號','1 Ngan O Road',22.283476,114.192199,'1530','');
        $this->insertLink('PS20000154','E20000089','天晉','The Wings','2011/08/31','唐賢街9號','9 Tong Yin Street',22.361509,114.116092,'1540','');
        $this->insertLink('PS20000155','E20000090','133 Portofino','133 Portofino','2020/09/30','康健路133號','133 Hong Kin Road',22.276653,114.176097,'1550','');
        $this->insertLink('PS20000156','E20000091','沙田第一城 1期','City One Shatin Phase 1','1980/10/01','得基街10號','10 Tak Kei Street',22.384481,114.204473,'1560','');
        $this->insertLink('PS20000157','E20000091','沙田第一城 2期','City One Shatin Phase 2','1982/04/01','百得街2號','2 Pak Tak Street',22.309546,114.234207,'1570','');
        $this->insertLink('PS20000158','E20000091','沙田第一城 3期','City One Shatin Phase 3','1983/08/13','樂城街4號','4 Lok Shing Street',22.362799,114.119578,'1580','');
        $this->insertLink('PS20000159','E20000091','沙田第一城 4期','City One Shatin Phase 4','1985/05/27','樂城街9號','9 Lok Shing Street',22.281133,114.21637,'1590','');
        $this->insertLink('PS20000160','E20000091','沙田第一城 5期','City One Shatin Phase 5','1985/10/02','樂城街1號','1 Lok Shing Street',22.244841,114.155991,'1600','');
        $this->insertLink('PS20000161','E20000091','沙田第一城 6期','City One Shatin Phase 6','1986/07/14','長城街1號','1 Cheung Shing Street',22.309578,114.190761,'1610','');
        $this->insertLink('PS20000162','E20000091','沙田第一城 7期','City One Shatin Phase 7','1987/10/28','恆城街2號','2 Hang Shing Street',22.281722,114.221739,'1620','');
        $this->insertLink('PS20000163','E20000092','御龍山','The Palazzo','2008/12/12','樂景街28號','28 Lok King Street',22.395408,114.199347,'1630','');
        $this->insertLink('PS20000164','E20000093','峻源','The Entrance','2019/09/14','落禾沙里1號','1 Lok Wo Sha Lane',22.419445,114.232719,'1640','');
        $this->insertLink('PS20000165','E20000094','海日灣II','Centra Horizon','2019/04/27','創新路18號','18 Chong San Road',22.320731,114.188739,'1650','');
        $this->insertLink('PS20000166','E20000095','數碼都域','Cyber Domaine','2009/08/04','塘坑','Tong Hang',22.4919782,114.1405558,'1660','');
        $this->insertLink('PS20000167','E20000096','天巒','Valais','2009/12/30','古洞路28,33號','28,33 Kwu Tung Road',22.445068,114.031435,'1670','');
        $this->insertLink('PS20000168','E20000097','珀爵','Manor Parc','2018/12/28','丹桂村里3號','3 Tan Kwai Tsuen Lane',22.412271,113.983524,'1680','');
        $this->insertLink('PS20000169','E20000098','栢慧豪園 一期 (栢慧豪園)','Central Park Towers Phase 1 (Central Park Towers)','2007/11/08','天恩路2號','2 Tin Yan Road',22.459142,114.001326,'1690','');
        $this->insertLink('PS20000170','E20000098','栢慧豪園 二期 (栢慧豪廷)','Central Park Towers Phase 2 (Central Park Towers  II)','2010/07/08','天恩路2號','2 Tin Yan Road',22.459142,114.001326,'1700','');
        $this->insertLink('PS20000171','E20000099','碧堤半島 1期','Bellagio Phase 1','2002/05/30','青山公路深井段33號','33 Castle Peak Road Sham Tseng',22.337766,114.156877,'1710','');
        $this->insertLink('PS20000172','E20000099','碧堤半島 2期','Bellagio Phase 2','2005/05/31','青山公路深井段33號','33 Castle Peak Road Sham Tseng',22.337766,114.156877,'1720','');
        $this->insertLink('PS20000173','E20000099','碧堤半島 3期','Bellagio Phase 3','2005/05/31','青山公路深井段33號','33 Castle Peak Road Sham Tseng',22.337766,114.156877,'1730','');
        $this->insertLink('PS20000174','E20000100','華景山莊','Wonderland Villas','1984/08/18','華景山路9號','9 Wah King Hill Road',22.353722,114.136666,'1740','');
        $this->insertLink('PS20000175','E20000101','屯門市廣場 1期','Tuen Mun Town Plaza Phase 1','1987/10/30','屯盛街1號',' 1 Tuen Shing Street',22.392807,113.977942,'1750','');
        $this->insertLink('PS20000176','E20000101','屯門市廣場 2期','Tuen Mun Town Plaza Phase 2','1988/12/09',' 屯隆街3號',' 3 Tuen Lung Street',22.394065,113.976215,'1760','');
        $this->insertLink('PS20000177','E20000102','環宇海灣','City Point','2014/09/19','永順街48號','48 Wing Shun Street',22.364199,114.114526,'1770','');
        $this->insertLink('PS20000178','E20000103','昇薈','The Visionary','2015/09/15','迎東路1-5號','1-5 Ying Tung Street',22.316446,114.173061,'1780','');
        $this->insertLink('PS20000179','E20000104','明翹匯','The Grand Marine','2019/11/01','細山路18號','18 Sai Shan Road',22.43468,114.168913,'1790','');
        $this->insertLink('PS20000180','E20000105','Whitesands','Whitesands','2015/02/10','嶼南道160號','160 South Lantau Road',22.237641,113.962182,'1800','');


    }
}
