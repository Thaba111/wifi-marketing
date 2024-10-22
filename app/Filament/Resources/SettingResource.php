<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Hash;



class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationGroup = 'Configuration';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Forms\Form $form): Forms\Form
{
    return $form->schema([
        // Section for SMS Gateway
        Section::make('SMS Gateway')
            ->schema([
                TextInput::make('sms_gateway_key')
                    ->default('sms_gateway')
                    ->label('Key')
                    ->disabled(),
                Select::make('sms_gateway_value')
                    ->options([
                        'safaricom' => 'Safaricom',
                        'text_sms' => 'Text SMS',
                    ])
                    ->label('Value')
                    ->required(),
            ]),

        // // Section for Email Gateway
        // Section::make('Email Gateway')
        //     ->schema([
        //         TextInput::make('email_gateway_key')
        //             ->default('email_gateway')
        //             ->label('Key')
        //             ->disabled(),
        //         Select::make('email_gateway_value')
        //             ->options([
        //                 'gmail' => 'Gmail',
        //                 'outlook' => 'Outlook',
        //             ])
        //             ->label('Value')
        //             ->required(),
        //     ]),

        // // Section for User Profile
        // Section::make('User Profile')
        //     ->schema([
        //         TextInput::make('user_name')
        //             ->label('Name')
        //             ->default(Auth::user()->name), // Remove disabled() if it needs to be editable
        //         TextInput::make('user_email')
        //             ->label('Email Address')
        //             ->default(Auth::user()->email)
        //             ->required()
        //             ->email(),
        //         FileUpload::make('profile_picture')
        //             ->label('Profile Picture')
        //             ->directory('profile_pictures')
        //             ->acceptedFileTypes(['image/jpeg', 'image/png'])
        //             ->maxSize(2048),
        //     ]),
    ]);
}
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('key')->label('Setting Key')->sortable()->searchable(),
            TextColumn::make('value')->label('Setting Value')->sortable(),
            TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
            TextColumn::make('updated_at')->label('Updated At')->dateTime()->sortable(),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
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
