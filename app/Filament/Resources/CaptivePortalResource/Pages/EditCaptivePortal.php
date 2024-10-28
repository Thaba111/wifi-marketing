<?php

namespace App\Filament\Resources\CaptivePortalResource\Pages;

use App\Filament\Resources\CaptivePortalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaptivePortal extends EditRecord
{
    protected static string $resource = CaptivePortalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
