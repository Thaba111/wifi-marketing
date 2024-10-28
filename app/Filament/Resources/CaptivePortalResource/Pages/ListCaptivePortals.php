<?php

namespace App\Filament\Resources\CaptivePortalResource\Pages;

use App\Filament\Resources\CaptivePortalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaptivePortals extends ListRecords
{
    protected static string $resource = CaptivePortalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
