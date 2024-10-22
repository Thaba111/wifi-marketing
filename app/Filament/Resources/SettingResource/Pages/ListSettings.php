<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use App\Models\Setting;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('key')
                ->label('Setting Key')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('value')
                ->label('Setting Value')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime()
                ->sortable(),
        ];
    }

   
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    
    protected function getTableFilters(): array
    {
        return [
            // 
        ];
    }

    // Optional: Handle row actions
    protected function getTableActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make()->confirm()->action(function (Setting $record) {
                $record->delete();
                $this->notify('success', 'Setting deleted successfully!');
            }),
        ];
    }
}
