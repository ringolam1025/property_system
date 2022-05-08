<?php

use Illuminate\Database\Seeder;
//use database\seeds\UsersAndNotesSeeder;
//use database\seeds\MenusTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(MenusTableSeeder::class);
        //$this->call(UsersAndNotesSeeder::class);
        $this->call('UsersAndNotesSeeder');
        $this->call('MenusTableSeeder');

        $this->call('DistrictTableSeeder');
        $this->call('SubDistrictTableSeeder');
        $this->call('BranchTableSeeder');

        $this->call('CustomerTableSeeder');
        $this->call('AgentTableSeeder');

        $this->call('EstateTableSeeder');
        $this->call('PhaseTableSeeder');
        $this->call('PropertyTableSeeder');
        $this->call('PropertyPhotoTableSeeder');

        $this->call('StampDutyTableSeeder');
        $this->call('BankRateTableSeeder');
        $this->call('BookingTableSeeder');
        $this->call('MortgageTableSeeder');

        $this->call('CompanySettingTableSeeder');
        $this->call('SearchHistoryTableSeeder');
        
    }
}
