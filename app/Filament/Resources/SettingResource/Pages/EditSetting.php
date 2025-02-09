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
'       key' => 'nullable|string|max:255|unique:settings,key,' . $this->record->id,             'value' => 'nullable|string',
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

    
}
