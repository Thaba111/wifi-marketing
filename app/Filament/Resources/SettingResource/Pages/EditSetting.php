<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Http\Request;
use App\Models\Setting; // Import the Setting model

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Allow empty key and value; both are not required
        return [
            'key' => $data['key'] ?? null,
            'value' => $data['value'] ?? null,
        ];
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'key' => 'nullable|string|max:255|unique:settings,key',
            'value' => 'nullable|string',
        ]);

        // Create the setting
        $setting = Setting::create($request->all());

        // Store the newly created setting in the session
        session(['new_setting' => [
            'key' => $setting->key,
            'value' => $setting->value,
        ]]);

        // Redirect or return response
        return redirect()->route('settings.index')->with('success', 'Setting added successfully.');
    }

    // Optional: Provide a way to show settings with details
    public function getSettingsDetails()
    {
        return [
            '2.6 Settings and Configuration' => [
                '2.6.1 Features' => [
                    'System-wide settings for configuring integrations, branding, notifications, and user preferences.',
                    'API keys and third-party service credentials management.',
                    'Branding options for splash pages and email templates.',
                ],
                '2.6.2 Database Fields' => [
                    'settings',
                    'id (int, primary key, auto-increment)',
                    'key (string, unique)',
                    'value (text)',
                    'created_at (timestamp)',
                    'updated_at (timestamp)',
                ],
            ],
        ];
    }
}
