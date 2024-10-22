<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        Setting::updateOrCreate(['key' => 'sms_gateway'], ['value' => 'safaricom']);
        Setting::updateOrCreate(['key' => 'email_gateway'], ['value' => 'gmail']);
    }
}
s