<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        DB::table('settings')->insert([
            [
                'key'         => 'site_title',
                'label'       => 'Site Title',
                'value'       => config('project.app.title'),
                'type'        =>'textbox',
            ],[
                'key'         => 'site_logo',
                'label'       => 'Site logo',
                'value'       => 'uploads/settings/logo.png',
                'type'        =>'image',
            ],[
                'key'         => 'site_description',
                'label'       => 'Description',
                'value'       => config('project.app.description'),
                'type'        =>'textarea',
            ],[
                'key'         => 'site_key_words',
                'label'       => 'SEO Key Words',
                'value'       => config('project.app.key_words'),
                'type'        =>'textbox',
            ],[
                'key'         => 'site_favicon',
                'label'       => 'Site Favicon',
                'value'       => 'uploads/settings/favicon.png',
                'type'        =>'image',
            ],[
                'key'         => 'site_email',
                'label'       => 'Email Address',
                'value'       => 'admin@test.com',
                'type'        => 'email'
            ],[
                'key'         => 'site_contact_received_email',
                'label'       => 'Contact Received Email address',
                'value'       => 'contact@test.com',
                'type'        => 'email'
            ], [
                'key'         => 'site_phone',
                'label'       => 'Phone',
                'value'       => '+855122545',
                'type'        => 'phone'
            ],[
                'key'         => 'site_mobile',
                'label'       => 'Mobile',
                'value'       => '0123658455',
                'type'        => 'mobile'
            ],[
                'key'         => 'site_address',
                'label'       => 'Site Address',
                'value'       => 'Cairo,Egypt',
                'type'        =>'textarea'
            ],[
                'key'         => 'site_google_map_location',
                'label'       => 'Site Google Map Location (latitude,longitude)',
                'value'       => '27.12072911846673, 28.548187701894005',
                'type'        =>'google_map'
            ]

        ]);

        Cache::forget('settings');
    }
}
