<?php

namespace App\Filament\Resources\CampaignReportResource\Pages;

use App\Filament\Resources\CampaignReportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Actions\CreateAction;

class CreateCampaignReport extends CreateRecord
{
    protected static string $resource = CampaignReportResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
