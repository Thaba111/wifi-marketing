<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array {
        return [
            'all' => Tab::make('All users'),
            'admins' => Tab::make('Admins')
                ->modifyQueryUsing(function ($query) {
                    $query->admins();
                }),
            'marketers' => Tab::make('Marketers')
                ->modifyQueryUsing(function ($query) {
                    $query->marketers();
                }),
            'viewers' => Tab::make('Viewers')
                ->modifyQueryUsing(function ($query) {
                    $query->viewers();
                }),
        ];
    }
}
