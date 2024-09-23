<?php
namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('invoices')->delete();


        DB::table('invoices')->insert([
            ['title'=>'INV 1','amount'=>'56','date'=>Carbon::parse('2024-8-25'),'description'=>'Dumy data','admin_id'=>'1'],            
            ['title'=>'INV 2','amount'=>'46','date'=>Carbon::parse('2024-6-22'),'description'=>'Dumy data','admin_id'=>'1'],            
            ['title'=>'INV 3','amount'=>'15','date'=>Carbon::parse('2024-8-25'),'description'=>'Dumy data','admin_id'=>'1'],
            ['title'=>'INV 4','amount'=>'85','date'=>Carbon::parse('2024-5-17'),'description'=>'Dumy data','admin_id'=>'2'],
            ['title'=>'INV 5','amount'=>'33','date'=>Carbon::parse('2024-3-12'),'description'=>'Dumy data','admin_id'=>'3'],
            ['title'=>'INV 6','amount'=>'54','date'=>Carbon::parse('2024-2-20'),'description'=>'Dumy data','admin_id'=>'4'],
            ['title'=>'INV 7','amount'=>'30','date'=>Carbon::parse('2024-1-15'),'description'=>'Dumy data','admin_id'=>'4'],            
        ]);





    }
}
