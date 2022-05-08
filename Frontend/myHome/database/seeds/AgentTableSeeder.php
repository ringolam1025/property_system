<?php

use Illuminate\Database\Seeder;

class AgentTableSeeder extends Seeder
{
    public function insertLink($agent_id,$eName_firstName,$eName_lastName,$cName_firstName,$cName_lastName,$title,$phone,$mobile, $email, $year_of_service,$license, $agent_photo=''){
        $colorCode = array('#378006', '#ff0000', '#73e600', '#0066ff');
        DB::table('tbl_agent')->insert([
            'agent_id' => $agent_id,
            'agent_eName_firstName' => $eName_firstName,
            'agent_eName_lastName' => $eName_lastName,
            'agent_cName_firstName' => $cName_firstName,
            'agent_cName_lastName' => $cName_lastName,            
            'agent_title' => $title,
            'agent_phone' => $phone,
            'agent_mobile' => $mobile,
            'agent_email' => $email,
            'agent_year_of_service' => $year_of_service,
            'agent_license' => $license,
            'agent_photo'=>'',
            'color_code'=>$colorCode[rand(0, sizeof($colorCode)-1)],
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
        $this->insertLink('A2000001','Hayden','Bieber','海登','比伯','Manager','38899638','67143927','myhomedemo01@gmail.com','2','072885');
        $this->insertLink('A2000002','Marcus','White','馬庫斯','懷特','Supervisor','21808580','59398367','myhomedemo01@gmail.com','14','198006');
        $this->insertLink('A2000003','Joseph','Duffy','約瑟夫','達菲','Account Supervisor','29770970','58799236','myhomedemo01@gmail.com','6','728487');
        $this->insertLink('A2000004','Marty','Grecic','馬蒂','格雷西奇','Senior Account Manager','23855256','99588657','myhomedemo01@gmail.com','6','369229');
        $this->insertLink('A2000005','Eddie','Benson','埃迪','班森','Account Supervisor','33341924','62971602','myhomedemo01@gmail.com','13','268372');
        $this->insertLink('A2000006','Mitch','Mcadams','米奇','麥亞當斯','Account Manager','22130774','92367427','myhomedemo01@gmail.com','20','816660');
        $this->insertLink('A2000007','Glenn','Whittaker','格倫','惠特克','Manager','32633937','93504703','myhomedemo01@gmail.com','24','495775');
        $this->insertLink('A2000008','Cody','Anderson','科迪','安德森','Supervisor','28299576','97600626','myhomedemo01@gmail.com','14','254021');
        $this->insertLink('A2000009','Mason','Blaine','梅森','布萊恩','Account Supervisor','20938375','69593701','myhomedemo01@gmail.com','16','995826');
        $this->insertLink('A2000010','Larry','Clive','拉里','克萊夫','Senior Account Manager','29167331','99300121','myhomedemo01@gmail.com','19','458187');
        $this->insertLink('A2000011','Marcus','Maddux','馬庫斯','麥達克斯','Account Supervisor','38684076','52738767','myhomedemo01@gmail.com','24','889354');
        $this->insertLink('A2000012','Vanessa','Cook','凡妮莎','庫克','Account Manager','21766929','93302327','myhomedemo01@gmail.com','17','882929');
        $this->insertLink('A2000013','Debbie','Weller','黛比','韋勒','Manager','23070124','63712750','myhomedemo01@gmail.com','17','727917');
        $this->insertLink('A2000014','Amanda','Jones','艾曼達','瓊斯','Supervisor','25353997','96077555','myhomedemo01@gmail.com','3','914564');
        $this->insertLink('A2000015','Jillian','Adames','吉莉安','阿德姆斯','Account Supervisor','28918169','59103350','myhomedemo01@gmail.com','21','812927');
        $this->insertLink('A2000016','Brooke','Mullally','布魯克','穆拉利','Manager','34061619','66339458','myhomedemo01@gmail.com','20','086000');
        $this->insertLink('A2000017','Alissa','Birch','艾莉莎','樺','Supervisor','34891002','62593231','myhomedemo01@gmail.com','4','170243');
        $this->insertLink('A2000018','Brianna','Scott','布麗安娜','斯科特','Account Supervisor','34400029','98284584','myhomedemo01@gmail.com','26','614287');
        $this->insertLink('A2000019','Andrea','Maddux','安德里亞','麥達克斯','Senior Account Manager','35782144','61483364','myhomedemo01@gmail.com','27','626363');
        $this->insertLink('A2000020','Lilly','Paul','莉莉','保羅','Account Supervisor','35855270','96541272','myhomedemo01@gmail.com','12','699716');
        $this->insertLink('A2000021','Sarah','Wonka','莎拉','旺卡','Manager','38664912','54596077','myhomedemo01@gmail.com','22','984274');
        $this->insertLink('A2000022','Charlotte','Grant','夏洛特','格蘭特','Supervisor','27092086','56682355','myhomedemo01@gmail.com','5','757006');
        $this->insertLink('A2000023','Jennifer','Donovan','珍妮弗','多諾萬','Account Supervisor','38462661','63824139','myhomedemo01@gmail.com','17','475315');
        $this->insertLink('A2000024','Rebecca','Parker','麗貝卡','派克','Senior Account Manager','28085218','65524300','myhomedemo01@gmail.com','25','089403');
        $this->insertLink('A2000025','Christina','Gunter','克莉絲蒂娜','岡特','Manager','26434679','52477384','myhomedemo01@gmail.com','14','447404');
        $this->insertLink('A2000026','Jennifer','Stanford','珍妮弗','斯坦福','Manager','36230632','62034930','myhomedemo01@gmail.com','23','470145');
        $this->insertLink('A2000027','Vera','Paisley','薇拉','佩斯利','Supervisor','36538089','64419136','myhomedemo01@gmail.com','17','272652');
        $this->insertLink('A2000028','Dana','Hemsworth','戴娜','漢斯沃','Account Supervisor','28572707','99839292','myhomedemo01@gmail.com','15','153149');
        $this->insertLink('A2000029','Lia','Asher','利雅','亞瑟','Senior Account Manager','29195852','91553479','myhomedemo01@gmail.com','16','205100');
        $this->insertLink('A2000030','Evangeline','Butler','伊凡潔琳','巴特勒','Account Supervisor','26588045','99387493','myhomedemo01@gmail.com','5','780908');
        $this->insertLink('A2000031','Rosie','Caulfield','羅茜','考菲爾德','Account Manager','27375087','67040066','myhomedemo01@gmail.com','29','621432');
        $this->insertLink('A2000032','Judy','Gardner','茱蒂','加德納','Manager','20781457','92918469','myhomedemo01@gmail.com','26','307485');
        $this->insertLink('A2000033','Katie','Robertson','凱蒂','羅伯遜','Supervisor','22171116','66306823','myhomedemo01@gmail.com','22','170626');
        $this->insertLink('A2000034','Elijah','Benson','以利亞','班森','Account Supervisor','30916185','90961916','myhomedemo01@gmail.com','24','738205');
        $this->insertLink('A2000035','Gabriel','Campbell','加布里埃爾','坎貝爾','Senior Account Manager','30609768','60423310','myhomedemo01@gmail.com','24','807755');
        $this->insertLink('A2000036','Joseph','Simmons','約瑟夫','西蒙斯','Account Supervisor','22524097','90302939','myhomedemo01@gmail.com','7','423900');
        $this->insertLink('A2000037','David','Keyser','大衛','凱瑟','Account Manager','29417348','94264564','myhomedemo01@gmail.com','26','598613');
        $this->insertLink('A2000038','Miguel','Charles','米格爾','查爾斯','Manager','34700286','92474316','myhomedemo01@gmail.com','4','647246');
        $this->insertLink('A2000039','Reggie','Stepanek','雷吉','史特潘尼','Supervisor','22508675','97271534','myhomedemo01@gmail.com','6','452800');
        $this->insertLink('A2000040','Reggie','Heigl','雷吉','海格爾','Account Supervisor','31020308','96455226','myhomedemo01@gmail.com','28','068761');
        $this->insertLink('A2000041','John','Cullen','約翰','卡倫','Manager','39000905','92666341','myhomedemo01@gmail.com','27','248504');
        $this->insertLink('A2000042','Isaac','Vives','以撒','比韋斯','Supervisor','38630743','96447363','myhomedemo01@gmail.com','7','023712');
        $this->insertLink('A2000043','Ian','Lawson','伊恩','勞森','Account Supervisor','24541445','94309104','myhomedemo01@gmail.com','3','124267');
        $this->insertLink('A2000044','Harrison','Franco','哈里森','佛朗哥','Senior Account Manager','25644384','50652956','myhomedemo01@gmail.com','20','341242');
        $this->insertLink('A2000045','Bryce','Abkarian','布萊斯','阿布卡瑞安','Account Supervisor','32332437','66263982','myhomedemo01@gmail.com','29','366508');
        $this->insertLink('A2000046','Brendan','Paul','布蘭登','保羅','Manager','23012940','94655530','myhomedemo01@gmail.com','27','184777');
        $this->insertLink('A2000047','Marty','Jackson','馬蒂','傑克遜','Supervisor','28233039','92877284','myhomedemo01@gmail.com','12','963044');
        $this->insertLink('A2000048','Aidan','Giles','艾丹','賈爾斯','Supervisor','31749174','99364290','myhomedemo01@gmail.com','18','956094');
        $this->insertLink('A2000049','Johnny','Doohan','約翰尼','杜漢','Account Supervisor','33662614','58071399','myhomedemo01@gmail.com','5','920777');
        $this->insertLink('A2000050','Fernando','Harmon','費爾南多','哈蒙','Senior Account Manager','23169226','61109921','myhomedemo01@gmail.com','19','846544');
        $this->insertLink('A2000051','Ryan','Johnson','瑞安','約翰遜','Account Supervisor','29416971','90890768','myhomedemo01@gmail.com','23','125988');
        $this->insertLink('A2000052','Joshua','Riperton','約書亞','裡佩頓','Account Manager','35768083','92868082','myhomedemo01@gmail.com','23','105996');
        $this->insertLink('A2000053','Glenn','Clements','格倫','克萊門茨','Manager','33917109','65545149','myhomedemo01@gmail.com','8','409379');
        $this->insertLink('A2000054','Xavier','Hawkins','澤維爾','霍金斯','Supervisor','20875820','55697118','myhomedemo01@gmail.com','22','641881');
        $this->insertLink('A2000055','Dylan','Riperton','迪倫','裡佩頓','Account Supervisor','23460097','68694471','myhomedemo01@gmail.com','17','415807');
        $this->insertLink('A2000056','Camille','Gaddis','卡米兒','加迪斯','Manager','24136418','59576591','myhomedemo01@gmail.com','29','130665');
        $this->insertLink('A2000057','Lizzie','Carlisle','麗茲','卡萊爾','Supervisor','26218364','64766871','myhomedemo01@gmail.com','1','935720');
        $this->insertLink('A2000058','Kimberly','Lewis','金伯莉','路易斯','Account Supervisor','23480594','56866363','myhomedemo01@gmail.com','8','710458');
        $this->insertLink('A2000059','Alexia','Abbadie','亞歷克西婭','阿巴迪','Senior Account Manager','23071761','98398180','myhomedemo01@gmail.com','5','502510');
        $this->insertLink('A2000060','Mia','Leonard','咪雅','倫納德','Account Supervisor','24073371','98513269','myhomedemo01@gmail.com','15','893539');
        $this->insertLink('A2000061','Ava','Riperton','艾娃','裡佩頓','Manager','22468095','94054579','myhomedemo01@gmail.com','12','601872');
        $this->insertLink('A2000062','Haley','Walker','海利','沃克','Supervisor','32659991','55729333','myhomedemo01@gmail.com','2','314563');
        $this->insertLink('A2000063','Katie','Gerard','凱蒂','杰拉德','Account Supervisor','20154062','90012226','myhomedemo01@gmail.com','23','527112');
        $this->insertLink('A2000064','Sophia','Donovan','索菲亞','多諾萬','Senior Account Manager','23998313','95204532','myhomedemo01@gmail.com','13','954166');
        $this->insertLink('A2000065','Caitlin','Lester','凱特琳','萊斯特','Manager','24388003','93957532','myhomedemo01@gmail.com','8','757858');
        $this->insertLink('A2000066','Becca','Claire','貝卡','克萊爾','Senior Account Manager','25299175','99229461','myhomedemo01@gmail.com','15','128165');
        $this->insertLink('A2000067','Diane','Walton','黛安','沃爾頓','Account Supervisor','27155176','66183949','myhomedemo01@gmail.com','1','281238');
        $this->insertLink('A2000068','Kaitlyn','Garcia','凱特林','加西亞','Manager','30886271','93928033','myhomedemo01@gmail.com','11','838385');
        $this->insertLink('A2000069','Monique','Garver','莫尼克','加弗','Supervisor','21496528','93286621','myhomedemo01@gmail.com','22','185726');
        $this->insertLink('A2000070','Laura','Mraz','蘿拉','瑪耶茲','Supervisor','21602809','59113430','myhomedemo01@gmail.com','23','394122');
        $this->insertLink('A2000071','Claire','Lester','克萊爾','萊斯特','Account Supervisor','33530643','50211828','myhomedemo01@gmail.com','2','042695');
        $this->insertLink('A2000072','Nadia','Cecil','娜迪亞','塞西爾','Senior Account Manager','23457909','96922723','myhomedemo01@gmail.com','4','990288');
        $this->insertLink('A2000073','Erin','Dale','艾琳','戴爾','Account Supervisor','29682304','95988173','myhomedemo01@gmail.com','1','264718');
        $this->insertLink('A2000074','Alexandra','Keaton','亞歷珊卓','基頓','Account Manager','38822478','64945051','myhomedemo01@gmail.com','5','310411');
        $this->insertLink('A2000075','Jennifer','Warner','珍妮弗','華納','Manager','22992886','69175243','myhomedemo01@gmail.com','5','804424');
        $this->insertLink('A2000076','Christina','Lautner','克莉絲蒂娜','勞特納','Supervisor','20747630','93413951','myhomedemo01@gmail.com','18','953074');
        $this->insertLink('A2000077','Ashley','Rahman','艾希莉','拉赫曼','Account Supervisor','31709740','97788893','myhomedemo01@gmail.com','22','550153');
        $this->insertLink('A2000078','Teddy','Birch','泰迪','樺','Manager','29382552','91296237','myhomedemo01@gmail.com','3','058430');
        $this->insertLink('A2000079','Gary','Bowen','蓋瑞','鮑溫','Supervisor','32270364','55168123','myhomedemo01@gmail.com','12','146589');
        $this->insertLink('A2000080','Evan','Bolton','埃文','博爾頓','Account Supervisor','22794636','99105436','myhomedemo01@gmail.com','7','798513');
        $this->insertLink('A2000081','Connor','Carlisle','康納','卡萊爾','Senior Account Manager','21085900','93125162','myhomedemo01@gmail.com','5','814983');
        $this->insertLink('A2000082','Tristan','Haddock','特里斯坦','哈德克','Account Supervisor','32646114','69622166','myhomedemo01@gmail.com','5','186311');
        $this->insertLink('A2000083','Cole','White','科爾','懷特','Manager','23478794','67402188','myhomedemo01@gmail.com','1','902939');
        $this->insertLink('A2000084','Mitch','Barrow','米奇','巴羅','Supervisor','27350230','92202531','myhomedemo01@gmail.com','20','353769');
        $this->insertLink('A2000085','Kenny','Cecil','肯尼','塞西爾','Account Supervisor','36090093','69801660','myhomedemo01@gmail.com','30','180083');
        $this->insertLink('A2000086','Jax','White','賈克斯','懷特','Senior Account Manager','20939275','98561983','myhomedemo01@gmail.com','4','298110');
        $this->insertLink('A2000087','Sergey','Robinson','謝爾蓋','羅賓遜','Manager','29315905','62322396','myhomedemo01@gmail.com','11','260806');
        $this->insertLink('A2000088','Joshua','Heigl','約書亞','海格爾','Supervisor','26475675','68703730','myhomedemo01@gmail.com','26','482977');
        $this->insertLink('A2000089','Danny','Garcia','丹尼','加西亞','Account Supervisor','38368404','95103458','myhomedemo01@gmail.com','15','093767');
        $this->insertLink('A2000090','Pete','Middleton','皮特','米德爾頓','Senior Account Manager','20547107','55370220','myhomedemo01@gmail.com','12','751918');
        $this->insertLink('A2000091','Bryce','Brian','布萊斯','布萊恩','Supervisor','28163021','69120840','myhomedemo01@gmail.com','26','219387');
        $this->insertLink('A2000092','Johannes','Cecil','約翰內斯','塞西爾','Account Supervisor','24247944','51529554','myhomedemo01@gmail.com','4','138485');
        $this->insertLink('A2000093','Richard','Heigl','理查德','海格爾','Manager','32814266','90004128','myhomedemo01@gmail.com','3','412678');
        $this->insertLink('A2000094','Jack','Kirk','傑克','柯克斯','Supervisor','35035966','90405677','myhomedemo01@gmail.com','27','119148');
        $this->insertLink('A2000095','Devin','Nicole','德文','尼科爾','Account Supervisor','30816694','93137597','myhomedemo01@gmail.com','7','436327');
        $this->insertLink('A2000096','Oscar','Reynes','奧斯卡','雷恩斯','Senior Account Manager','35416372','91585703','myhomedemo01@gmail.com','12','986265');
        $this->insertLink('A2000097','Robert','Blackwood','羅伯特','布萊克伍德','Account Supervisor','27281311','60195117','myhomedemo01@gmail.com','20','253775');
        $this->insertLink('A2000098','Leland','Johnson','利蘭','約翰遜','Manager','25863000','95809519','myhomedemo01@gmail.com','20','167710');
        $this->insertLink('A2000099','Jared','Alexander','傑瑞德','亞歷山大','Supervisor','35689629','96358627','myhomedemo01@gmail.com','7','241223');
        $this->insertLink('A2000100','Megan','Wonka','梅根','旺卡','Account Supervisor','37969496','50117493','myhomedemo01@gmail.com','29','135330');
        $this->insertLink('A2000101','Kara','Burton','卡拉','伯頓','Senior Account Manager','31367175','92518399','myhomedemo01@gmail.com','11','146657');
        $this->insertLink('A2000102','Belinda','Hammer','貝琳達','嘿默','Manager','39606959','55661276','myhomedemo01@gmail.com','10','543158');
        $this->insertLink('A2000103','Mindy','Haddock','敏荻','哈德克','Manager','38037366','97140851','myhomedemo01@gmail.com','16','573954');
        $this->insertLink('A2000104','Chloe','Butler','克洛伊','巴特勒','Supervisor','31079515','69288366','myhomedemo01@gmail.com','2','909437');
        $this->insertLink('A2000105','Alexia','Dinwiddie','亞歷克西婭','丁威迪','Supervisor','27484583','96056639','myhomedemo01@gmail.com','21','024687');
        $this->insertLink('A2000106','Clementine','Bledel','克萊門泰','布萊德爾','Account Supervisor','38139178','51441158','myhomedemo01@gmail.com','8','963887');
        $this->insertLink('A2000107','Brittany','Rahman','布列塔尼','拉赫曼','Senior Account Manager','32435008','51599921','myhomedemo01@gmail.com','20','649587');
        $this->insertLink('A2000108','Lena','Jackson','莉娜','傑克遜','Account Supervisor','29530776','55855473','myhomedemo01@gmail.com','10','692405');
        $this->insertLink('A2000109','Ashley','Jefferson','艾希莉','杰佛森','Account Manager','35655599','91174085','myhomedemo01@gmail.com','15','455313');
        $this->insertLink('A2000110','Jacqueline','Hemsworth','賈桂琳','漢斯沃','Manager','27812839','94303979','myhomedemo01@gmail.com','28','851321');
        $this->insertLink('A2000111','Paige','McNeil','佩奇','麥克尼爾','Supervisor','36928344','90519373','myhomedemo01@gmail.com','5','259880');
        $this->insertLink('A2000112','Vanessa','Kirk','凡妮莎','柯克斯','Account Supervisor','26764925','90904019','myhomedemo01@gmail.com','7','893314');
        $this->insertLink('A2000113','Diane','Cassidy','黛安','凱西迪','Manager','21323608','51460526','myhomedemo01@gmail.com','29','950533');
        $this->insertLink('A2000114','Bonnie','Michaels','邦妮','邁克爾斯','Supervisor','39824603','68449129','myhomedemo01@gmail.com','12','380395');
        $this->insertLink('A2000115','Rosie','Stepanek','羅茜','史特潘尼','Account Supervisor','38982357','62468665','myhomedemo01@gmail.com','28','732447');
        $this->insertLink('A2000116','Eva','Benton','伊娃','本頓','Senior Account Manager','25549734','68702127','myhomedemo01@gmail.com','24','270448');
        $this->insertLink('A2000117','Amanda','Grecic','艾曼達','格雷西奇','Account Supervisor','28027397','90965505','myhomedemo01@gmail.com','20','262986');
        $this->insertLink('A2000118','Rosie','Haddock','羅茜','哈德克','Manager','33589665','55072871','myhomedemo01@gmail.com','19','486576');
        $this->insertLink('A2000119','Sarah','Turner','莎拉','特納','Supervisor','29085840','52870222','myhomedemo01@gmail.com','9','028219');
        $this->insertLink('A2000120','Sophia','Anderson','索菲亞','安德森','Account Supervisor','33951318','68086147','myhomedemo01@gmail.com','22','332336');
        $this->insertLink('A2000121','Melanie','Hopper','梅蘭妮','霍普','Senior Account Manager','34491583','56404488','myhomedemo01@gmail.com','12','460609');
        $this->insertLink('A2000122','Daniel','Lautner','丹尼爾','勞特納','Manager','24623383','91227837','myhomedemo01@gmail.com','23','376152');
        $this->insertLink('A2000123','Richard','Adames','理查德','阿德姆斯','Senior Account Manager','27328488','55514944','myhomedemo01@gmail.com','4','377831');
        $this->insertLink('A2000124','Mickey','Walton','米奇','沃爾頓','Account Supervisor','33470664','97480143','myhomedemo01@gmail.com','25','455868');
        $this->insertLink('A2000125','Elijah','Daul','以利亞','道爾','Manager','28439490','54455315','myhomedemo01@gmail.com','22','978433');
        $this->insertLink('A2000126','Pete','Donovan','皮特','多諾萬','Supervisor','25694008','97732531','myhomedemo01@gmail.com','30','732129');
        $this->insertLink('A2000127','Nathaniel','Rodney','納撒尼爾','羅德尼','Supervisor','37739663','92671990','myhomedemo01@gmail.com','5','817186');
        $this->insertLink('A2000128','Michael','Richards','邁克爾','理查茲','Account Supervisor','39900077','90604845','myhomedemo01@gmail.com','2','148111');
        $this->insertLink('A2000129','Austin','Birch','奧斯汀','樺','Senior Account Manager','26474261','93813492','myhomedemo01@gmail.com','1','701863');
        $this->insertLink('A2000130','Jaime','Giles','詹姆','賈爾斯','Account Supervisor','39613249','60707347','myhomedemo01@gmail.com','13','753577');
        $this->insertLink('A2000131','Zachary','Benson','扎卡里','班森','Account Manager','30764923','92478413','myhomedemo01@gmail.com','20','877723');
        $this->insertLink('A2000132','Garrett','Burton','加勒特','伯頓','Manager','27537171','92438129','myhomedemo01@gmail.com','29','233024');
        $this->insertLink('A2000133','Richard','Grant','理查德','格蘭特','Supervisor','30284848','52020043','myhomedemo01@gmail.com','27','592816');
        $this->insertLink('A2000134','Samuel','Coombs','塞繆爾','庫姆斯','Account Supervisor','26161969','62493608','myhomedemo01@gmail.com','10','877594');
        $this->insertLink('A2000135','Frank','Mcadams','弗蘭克','麥亞當斯','Manager','29452840','67732217','myhomedemo01@gmail.com','25','829745');
        $this->insertLink('A2000136','Jonathan','Clements','喬納森','克萊門茨','Supervisor','37325853','52517060','myhomedemo01@gmail.com','3','123514');
        $this->insertLink('A2000137','Roy','Harris','羅伊','哈里斯','Account Supervisor','25236315','68861450','myhomedemo01@gmail.com','30','751573');
        $this->insertLink('A2000138','Brendan','Maddux','布蘭登','麥達克斯','Senior Account Manager','37959386','98872571','myhomedemo01@gmail.com','5','600026');
        $this->insertLink('A2000139','Larry','Abbadie','拉里','阿巴迪','Account Supervisor','27311063','50949337','myhomedemo01@gmail.com','10','038560');
        $this->insertLink('A2000140','Cole','Asher','科爾','亞瑟','Manager','22748388','93523701','myhomedemo01@gmail.com','28','050633');
        $this->insertLink('A2000141','Edward','Michaels','愛德華','邁克爾斯','Supervisor','21969480','97750395','myhomedemo01@gmail.com','23','143829');
        $this->insertLink('A2000142','Jack','Giles','傑克','賈爾斯','Account Supervisor','36488524','69034983','myhomedemo01@gmail.com','21','233040');
        $this->insertLink('A2000143','Samuel','Adams','塞繆爾','亞當斯','Senior Account Manager','39906791','52698475','myhomedemo01@gmail.com','7','503409');
        $this->insertLink('A2000144','Victoria','Alexander','維多利亞','亞歷山大','Manager','21511693','50041437','myhomedemo01@gmail.com','12','688446');
        $this->insertLink('A2000145','Angela','Robertson','安吉拉','羅伯遜','Supervisor','34836972','64155532','myhomedemo01@gmail.com','5','129881');
        $this->insertLink('A2000146','Pamela','Blackwood','帕梅拉','布萊克伍德','Account Supervisor','22916813','94649974','myhomedemo01@gmail.com','10','852324');
        $this->insertLink('A2000147','Amanda','Gerard','艾曼達','杰拉德','Senior Account Manager','26199696','94258774','myhomedemo01@gmail.com','18','353140');
        $this->insertLink('A2000148','Ashley','Scott','艾希莉','斯科特','Supervisor','29707723','68566630','myhomedemo01@gmail.com','10','912365');
        $this->insertLink('A2000149','Katherine','Carter','凱瑟琳','卡特','Account Supervisor','38235951','93439836','myhomedemo01@gmail.com','5','846646');
        $this->insertLink('A2000150','Alexandra','Breslin','亞歷珊卓','布萊斯林','Manager','24086038','68547651','myhomedemo01@gmail.com','14','174427');
        $this->insertLink('A2000151','Madeline','Wilmore','瑪德琳','威瑪','Supervisor','37390437','52463011','myhomedemo01@gmail.com','11','307404');
        $this->insertLink('A2000152','Mary','Eich','瑪麗','艾克','Account Supervisor','28822337','51440164','myhomedemo01@gmail.com','19','916014');
        $this->insertLink('A2000153','Natalie','Mantle','娜塔莉','曼特爾','Senior Account Manager','28983107','95687998','myhomedemo01@gmail.com','1','919946');
        $this->insertLink('A2000154','Victoria','Lawson','維多利亞','勞森','Account Supervisor','30235747','56115133','myhomedemo01@gmail.com','22','985340');
        $this->insertLink('A2000155','Rachel','Lewis','瑞秋','路易斯','Manager','22228328','57696482','myhomedemo01@gmail.com','22','066201');


    }
}
