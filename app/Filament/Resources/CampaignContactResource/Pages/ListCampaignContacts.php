<?php

namespace App\Filament\Resources\CampaignContactResource\Pages;

use App\Filament\Resources\CampaignContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampaignContacts extends ListRecords
{
    protected static string $resource = CampaignContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
