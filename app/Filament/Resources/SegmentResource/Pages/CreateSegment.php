<?php

namespace App\Filament\Resources\SegmentResource\Pages;

use App\Filament\Resources\SegmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSegment extends CreateRecord
{
    protected static string $resource = SegmentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['criteria'] = [
            'age' => $data['age'],
            'interests' => $data['interests'],
            'location' => $data['location'],
        ];

        unset($data['age'], $data['interests'], $data['location']);

        return $data;
    }
}
