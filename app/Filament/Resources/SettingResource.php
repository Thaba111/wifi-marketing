<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Components\{Section, TextInput, FileUpload, Grid, Textarea, Tabs, Toggle, Repeater};
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\{ViewAction, EditAction, DeleteAction};

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Settings';

    // Form Configuration
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Tabs::make('Settings')
                ->tabs([
                    Tabs\Tab::make('Profile Settings')
                        ->schema([
                            Section::make('My Profile')
                                ->description('Manage your profile details')
                                ->schema([
                                    Grid::make(2)
                                        ->schema([
                                            FileUpload::make('profile_picture')
                                                ->label('Profile Picture')
                                                ->directory('profile_pictures')
                                                ->image()
                                                ->maxSize(2048)
                                                ->avatar(),

                                            TextInput::make('name')
                                                ->label('Full Name')
                                                ->required(),
                                        ]),
                                    TextInput::make('role')->label('Role'),
                                    TextInput::make('location')->label('Location'),
                                ]),
                        ]),

                    Tabs\Tab::make('Email Settings')
                        ->schema([
                            Section::make('Email Preferences')
                                ->schema([
                                    TextInput::make('email')
                                        ->label('Email Address')
                                        ->email()
                                        ->required(),
                                    Toggle::make('newsletter')
                                        ->label('Receive Newsletter Emails')
                                        ->default(true),
                                ]),
                        ]),

                    Tabs\Tab::make('SMS Settings')
                        ->schema([
                            Section::make('SMS Preferences')
                                ->schema([
                                    TextInput::make('phone')
                                        ->label('Phone Number')
                                        ->tel(),
                                    Toggle::make('sms_notifications')
                                        ->label('Receive SMS Notifications')
                                        ->default(true),
                                ]),
                        ]),

                    Tabs\Tab::make('Additional Settings')
                        ->schema([
                            Section::make('Add More Settings')
                                ->description('Admins can add new settings here.')
                                ->schema([
                                    Repeater::make('custom_settings')
                                        ->schema([
                                            TextInput::make('setting_name')
                                                ->label('Setting Name')
                                                ->required(),
                                            Textarea::make('setting_value')
                                                ->label('Setting Value')
                                                ->rows(2),
                                        ])
                                        ->createItemButtonLabel('Add Setting'),
                                ]),
                        ]),
                ]),
        ])->columns(1);
    }

    // Table Configuration
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('First Name')
                    ->sortable()
                    ->getStateUsing(fn($record) => explode(' ', $record->name)[0] ?? ''), // Safe split for first name

                TextColumn::make('last_name')
                    ->label('Last Name')
                    ->sortable()
                    ->getStateUsing(fn($record) => explode(' ', $record->name)[1] ?? ''), // Safe split for last name

                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
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
