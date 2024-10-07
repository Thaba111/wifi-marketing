<?php

namespace App\Filament\Resources\CampaignContactResource\Pages;

use App\Filament\Resources\CampaignContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampaignContact extends EditRecord
{
    protected static string $resource = CampaignContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
