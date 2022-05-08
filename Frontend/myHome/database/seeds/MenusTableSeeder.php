<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MenusTableSeeder extends Seeder
{
    private $menuId = null;
    private $dropdownId = array();
    private $dropdown = false;
    private $sequence = 1;
    private $joinData = array();
    private $adminRole = null;
    private $userRole = null;

    public function join($roles, $menusId){
        $roles = explode(',', $roles);
        foreach($roles as $role){
            array_push($this->joinData, array('role_name' => $role, 'menus_id' => $menusId));
        }
    }

    /*
        Function assigns menu elements to roles
        Must by use on end of this seeder
    */
    public function joinAllByTransaction(){
        DB::beginTransaction();
        foreach($this->joinData as $data){
            DB::table('menu_role')->insert([
                'role_name' => $data['role_name'],
                'menus_id' => $data['menus_id'],
            ]);
        }
        DB::commit();
    }

    public function insertLink($roles, $name, $href, $icon = null){
        if($this->dropdown === false){
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'sequence' => $this->sequence
            ]);
        }else{
            DB::table('menus')->insert([
                'slug' => 'link',
                'name' => $name,
                'icon' => $icon,
                'href' => $href,
                'menu_id' => $this->menuId,
                'parent_id' => $this->dropdownId[count($this->dropdownId) - 1],
                'sequence' => $this->sequence
            ]);
        }
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        $permission = Permission::where('name', '=', $name)->get();
        if(empty($permission)){
            $permission = Permission::create(['name' => 'visit ' . $name]);
        }
        $roles = explode(',', $roles);
        if(in_array('user', $roles)){
            $this->userRole->givePermissionTo($permission);
        }
        if(in_array('admin', $roles)){
            $this->adminRole->givePermissionTo($permission);
        }
        return $lastId;
    }

    public function insertTitle($roles, $name){
        DB::table('menus')->insert([
            'slug' => 'title',
            'name' => $name,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence
        ]);
        $this->sequence++;
        $lastId = DB::getPdo()->lastInsertId();
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function beginDropdown($roles, $name, $icon = ''){
        if(count($this->dropdownId)){
            $parentId = $this->dropdownId[count($this->dropdownId) - 1];
        }else{
            $parentId = null;
        }
        DB::table('menus')->insert([
            'slug' => 'dropdown',
            'name' => $name,
            'icon' => $icon,
            'menu_id' => $this->menuId,
            'sequence' => $this->sequence,
            'parent_id' => $parentId
        ]);
        $lastId = DB::getPdo()->lastInsertId();
        array_push($this->dropdownId, $lastId);
        $this->dropdown = true;
        $this->sequence++;
        $this->join($roles, $lastId);
        return $lastId;
    }

    public function endDropdown(){
        $this->dropdown = false;
        array_pop( $this->dropdownId );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        /* Sample of create dropdown menu
        $this->beginDropdown('user,admin', 'Icons', 'cil-star');
            $this->insertLink('user,admin', 'CoreUI Icons',      '/icon/coreui-icons');
            $this->insertLink('user,admin', 'Flags',             '/icon/flags');
            $this->insertLink('user,admin', 'Brands',            '/icon/brands');
        $this->endDropdown();
        */

        /* Get roles */
        $this->adminRole = Role::where('name' , '=' , 'admin' )->first();
        $this->userRole = Role::where('name', '=', 'user' )->first();
        /* Create Sidebar menu */
        DB::table('menulist')->insert([
            'name' => 'sidebar menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $this->insertLink('user,admin', 'Dashboard', '/data/dashboard', 'cil-speedometer');
        
        $this->insertTitle('user,admin', 'Appointment Management');
        $this->insertLink('user,admin', 'Appointment', '/data/appointment', 'cil-house');


        $this->insertTitle('admin', 'Customer Management');
        $this->insertLink('admin', 'Customer', '/data/customer', 'cil-address-book');
        $this->insertLink('user,agent,admin', 'Search History', '/data/searchHistory', 'cil-history');
        // $this->insertLink('admin', 'Transaction', '/data/transaction', 'cil-money');

        $this->insertTitle('admin', 'Property Data');
        $this->insertLink('admin', 'Property', '/data/property', 'cil-house');
        $this->insertLink('admin', 'Phase', '/data/phase', 'cil-building');
        $this->insertLink('admin', 'Estate', '/data/estate', 'cil-house');        

        $this->insertTitle('admin', 'Master Data');
        $this->insertLink('admin', 'Branches', '/data/branch', 'cil-sitemap');
        $this->insertLink('admin', 'Agent', '/data/agent', 'cil-sitemap');
        $this->insertLink('admin', 'District', '/data/district', 'cil-location-pin');
        $this->insertLink('admin', 'Sub-District', '/data/subdistrict', 'cil-location-pin');
        
        $this->insertTitle('admin', 'Administrator');
        $this->insertLink('admin', 'Template', '/data/template', 'cil-notes');
        $this->insertLink('admin', 'Users', '/users', 'cil-user');
        $this->insertLink('admin', 'User role', '/roles', 'cil-people');
        


        /* Create top menu */
        DB::table('menulist')->insert([
            'name' => 'top menu'
        ]);
        $this->menuId = DB::getPdo()->lastInsertId();  //set menuId
        $id = $this->insertLink('guest,user,admin', 'Front-end',    '/');        
        $id = $this->beginDropdown('admin', 'Settings');
        $id = $this->insertLink('admin', 'Edit menu',               '/menu/menu');
        $id = $this->insertLink('admin', 'Edit menu elements',      '/menu/element');
        $this->endDropdown();

        $this->joinAllByTransaction(); ///   <===== Must by use on end of this seeder
    }
}
