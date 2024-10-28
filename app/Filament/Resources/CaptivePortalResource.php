<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaptivePortalResource\Pages;
use App\Models\CaptivePortal;
use Filament\Forms;
use Filament\Resources\Resource;

class CaptivePortalResource extends Resource
{
    protected static ?string $model = CaptivePortal::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Name'),

                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email'),

                Forms\Components\Checkbox::make('consent')
                    ->required()
                    ->label('I agree to the terms and conditions'),

                // Forms\Components\Button::make('Connect')
                //     ->submit(),
            ]);
    }

    protected function getPromotionalContent()
{
    return [
        'Welcome to our Wi-Fi service!',
        'Enjoy 20% off on your first purchase.',
        'Sign up now to receive exclusive offers.'
    ];
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaptivePortals::route('/'),
            'create' => Pages\CreateCaptivePortal::route('/create'),
        ];
    }
}

