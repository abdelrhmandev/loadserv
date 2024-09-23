<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();



        $Administrator = Role::create(['name' => config('project.admin.roles.0'),'guard_name'=>'admin']);
        $Administrator->givePermissionTo(Permission::all());
        $roles = [];
        foreach(config('project.admin.roles') as $key=>$role){
            if($key>0){ // Avoid Administrator Role
               $roles[$key]['name'] = $role;
               $roles[$key]['guard_name'] = 'admin';
               $roles[$key]['created_at'] = NOW();
            }
        }
        Role::insert($roles);
    }
}
