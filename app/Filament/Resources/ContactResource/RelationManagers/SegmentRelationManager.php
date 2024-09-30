<?php

namespace App\Filament\Resources\ContactResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms;
use Filament\Tables;

class SegmentRelationManager extends RelationManager
{
    protected static string $relationship = 'segments'; 
    
    protected static ?string $recordTitleAttribute = 'name'; 

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('name')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\Textarea::make('criteria')
                //     ->required()
                //     ->json(),
            ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('criteria')->sortable(),
                // Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ]);
    }
}
