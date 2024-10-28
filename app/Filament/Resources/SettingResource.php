<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Components\{
    TextInput, Repeater
};
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\{ViewAction, EditAction, DeleteAction};

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Settings';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('key')
                    ->required()
                    ->unique(Setting::class, 'key')
                    ->maxLength(255),

                Repeater::make('value')  
                    ->label('Setting Values')
                    ->schema([
                        TextInput::make('value')  // Keep this as it is to represent each value
                            ->label('Value')
                            ->required()
                    ])
                    ->collapsible()
                    ->createItemButtonLabel('Add New Value'),  // Customize button label
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            TextColumn::make('key')
                ->label('Setting Key')
                ->sortable()
                ->searchable(),

            TextColumn::make('value')
                ->label('Setting Value')
                ->formatStateUsing(function ($state) {
                    // Decode JSON and extract values
                    $decodedValues = json_decode($state, true);
                    if (is_array($decodedValues)) {
                        return implode(', ', array_column($decodedValues, 'value'));
                    }
                    return $state; // Fallback to original state
                })
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),

            TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime()
                ->sortable(),
        ])
        ->actions([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ])
        ->defaultSort('created_at', 'desc');
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
