<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdResource\Pages;
use App\Filament\Resources\AdResource\RelationManagers;
use App\Models\Ad;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\SelectFilter;




class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('content')
                    ->label('Ad Content')
                    ->required(),
                    Select::make('schedule_type')
                    ->label('Schedule Type')
                    ->options([
                        'one_time' => 'One-Time',
                        'daily' => 'Daily',
                        'weekly' => 'Weekly',
                        'monthly' => 'Monthly',
                    ])
                    ->required()
                    ->helperText('Select the schedule type'),

                DateTimePicker::make('start_time')
                    ->label('Start Time')
                    ->required(),
                DateTimePicker::make('end_time')
                    ->label('End Time')
                    ->required(),
                Textarea::make('target_audience')
                    ->label('Target Audience (JSON)')
                    ->required()
                    ->helperText('Enter target audience in JSON format')
                    ->rules(['json']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // TextColumn::make('id')->label('ID')->sortable(),
            TextColumn::make('title')->label('Title')->sortable()->searchable(),
            TextColumn::make('schedule')
                ->label('Schedule')
                ->sortable(),
            TextColumn::make('created_at')->label('Created At')->sortable(),
            TextColumn::make('updated_at')->label('Updated At')->sortable(),
            ])
            ->filters([
                SelectFilter::make('schedule')
                ->options([
                    'once' => 'Once',
                    'daily' => 'Daily',
                    'weekly' => 'Weekly',
                    'monthly' => 'Monthly',
                ])
                ->label('Schedule'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAds::route('/'),
            'create' => Pages\CreateAd::route('/create'),
            'edit' => Pages\EditAd::route('/{record}/edit'),
        ];
    }
}
