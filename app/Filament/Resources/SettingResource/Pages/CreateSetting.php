<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Setting;
use Filament\Notifications\Notification;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;

    // Override the save logic to store multiple settings
    protected function handleRecordCreation(array $data): Setting
    {
        // Save SMS Gateway settings
        Setting::updateOrCreate(
            ['key' => 'sms_gateway'],
            ['value' => $data['sms_gateway_value']]
        );

        // Save Email Gateway settings
        Setting::updateOrCreate(
            ['key' => 'email_gateway'],
            ['value' => $data['email_gateway_value']]
        );

        // Save User Profile settings
        Setting::updateOrCreate(
            ['key' => 'user_name'],
            ['value' => $data['user_name']]
        );

        Setting::updateOrCreate(
            ['key' => 'user_email'],
            ['value' => $data['user_email']]
        );

        // Handle file upload for profile picture
        if (isset($data['profile_picture'])) {
            Setting::updateOrCreate(
                ['key' => 'profile_picture'],
                ['value' => $data['profile_picture']->store('profile_pictures')]
            );
        }

        // Send success notification
        Notification::make()
            ->title('Settings saved successfully!')
            ->success()
            ->send();

        return new Setting(); // Return a dummy setting to complete the form flow
    }
}
