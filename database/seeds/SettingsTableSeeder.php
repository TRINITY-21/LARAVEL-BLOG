<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

        	'site_name' => 'Trinity Blog',
        	'address' => 'ghana tema',
        	'contact_number' => '024 505 0484',
        	'contact_email' => 'agyemanjoseph12@yahoo.com',
        ]);



    }
}
