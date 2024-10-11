<?php

namespace App\Filament\Resources\CampaignReportResource\Pages;

use App\Filament\Resources\CampaignReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampaignReport extends EditRecord
{
    protected static string $resource = CampaignReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
