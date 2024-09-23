<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();



        $permissions = [];
        foreach (config('project.admin.permissions_moudles') as $key => $value) {

            for ($i = 0; $i <= 0; $i++) {
                $permissions['create'][$key] = [
                    'name'        => $value . '-create',
                    'guard_name'  => 'admin',
                    'created_at'  =>NOW(),
                ];
                $permissions['list'][$key] = [
                    'name'        => $value . '-list',
                    'guard_name'  => 'admin',
                    'created_at'  =>NOW(),
                ];
                $permissions['edit'][$key] = [
                    'name'        => $value . '-edit',
                    'guard_name'  => 'admin',
                    'created_at'  =>NOW(),
                ];
                $permissions['delete'][$key] = [
                    'name'        => $value . '-delete',
                    'guard_name'  => 'admin',
                    'created_at'  =>NOW(),
                ];
            }
        }
        $c = array_merge($permissions['create'],$permissions['list'],$permissions['edit'],$permissions['delete']);
        Permission::insert($c);



    }
}
