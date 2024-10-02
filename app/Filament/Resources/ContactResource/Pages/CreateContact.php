<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use App\Models\ContactSegment;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $segmentId = $data['segment_id'];
        unset($data['segment_id']);

        $contact = Contact::create($data);

        ContactSegment::create([
            'contact_id' => $contact->id,
            'segment_id' => $segmentId,
        ]);

        return $contact;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Contact created & assigned to segment';
    }

    protected function getRedirectUrl(): string
    {
        return ContactResource::getUrl();
    }
}
