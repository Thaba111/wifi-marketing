<?php

namespace App\Filament\Resources\CampaignReportResource\Pages;

use App\Filament\Resources\CampaignReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampaignReports extends ListRecords
{
    protected static string $resource = CampaignReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
