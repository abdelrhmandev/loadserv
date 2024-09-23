<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('admins')->delete();

          \App\Models\Admin::create([
                'username'         =>'admin',
                'password'         =>Hash::make('12345678'),
                'email'            =>'admin@domain.com',
                'name'             =>'Abdelrahman magdy',
                'mobile'           =>'01872971280',
                'avatar'           =>'uploads/avatars/1.jpg',
                'is_active'        =>'1',
            ])->assignRole('Administrator');

            \App\Models\Admin::create([
                'username'         =>'remon',
                'password'         =>Hash::make('12345678'),
                'email'            =>'remon@loadserv.com.eg',
                'name'             =>'Remon Raafat',
                'mobile'           =>'01872971220',
                'avatar'           =>'uploads/avatars/2.jpg',
                'is_active'        =>'1',
            ])->assignRole('Administrator');




            \App\Models\Admin::create([
                'username'         =>'lili',
                'password'         =>Hash::make('12345678'),
                'email'            =>'emp1@domain.com',
                'name'             =>'lili Kolm',
                'mobile'           =>'01872971222',
                'avatar'           =>'uploads/avatars/3.jpg',
                'is_active'        =>'1',
            ])->assignRole('Employee');


            \App\Models\Admin::create([
                'username'         =>'gohm',
                'password'         =>Hash::make('12345678'),
                'email'            =>'emp2@domain.com',
                'name'             =>'gohm Kmu',
                'mobile'           =>'01872971221',
                'avatar'           =>'uploads/avatars/4.jpg',
                'is_active'        =>'1',
            ])->assignRole('Employee');



    }
}
