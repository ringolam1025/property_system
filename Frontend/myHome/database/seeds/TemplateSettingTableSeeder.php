<?php

use Illuminate\Database\Seeder;

class TemplateSettingTableSeeder extends Seeder
{
    public function insertLink($TemplateName, $template_path){
        DB::table('tbl_template_setting')->insert([
            'TemplateName' => $TemplateName,
            'template_path' => $template_path,
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
        $this->insertLink('Normal 1','normal_1');
        $this->insertLink('Normal 2','normal_2');
    }
}
