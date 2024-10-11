<?php

namespace App\Filament\Resources\BannerImpressionResource\Pages;

use App\Filament\Resources\BannerImpressionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBannerImpression extends EditRecord
{
    protected static string $resource = BannerImpressionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
