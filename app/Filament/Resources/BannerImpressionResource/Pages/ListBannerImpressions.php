<?php

namespace App\Filament\Resources\BannerImpressionResource\Pages;

use App\Filament\Resources\BannerImpressionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBannerImpressions extends ListRecords
{
    protected static string $resource = BannerImpressionResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
