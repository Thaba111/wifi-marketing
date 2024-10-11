<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignReportResource\Pages;
use App\Models\CampaignReport;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class CampaignReportResource extends Resource
{
    protected static ?string $model = CampaignReport::class;

    protected static ?string $navigationLabel = 'Campaign Reports';
    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('clicks')
                ->label('Clicks')
                ->required()
                ->numeric(),
            TextInput::make('opens')
                ->label('Opens')
                ->required()
                ->numeric(),
            TextInput::make('conversions')
                ->label('Conversions')
                ->required()
                ->numeric(),
            DatePicker::make('report_date')
                ->label('Report Date')
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('campaign.title')->label('Campaign')->sortable()->searchable(),
                TextColumn::make('clicks')->label('Clicks')->sortable(),
                TextColumn::make('opens')->label('Opens')->sortable(),
                TextColumn::make('conversions')->label('Conversions')->sortable(),
                TextColumn::make('report_date')
                    ->label('Report Date')
                    ->date() // This formats the date
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime() // This formats the date and time
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([ 
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampaignReports::route('/'),
            'create' => Pages\CreateCampaignReport::route('/create'),
            'edit' => Pages\EditCampaignReport::route('/{record}/edit'),
        ];
    }
}
