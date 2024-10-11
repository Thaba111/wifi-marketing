<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignReportResource\Pages;
use App\Models\CampaignReport;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class CampaignReportResource extends Resource
{
    protected static ?string $model = CampaignReport::class;

    protected static ?string $navigationLabel = 'Campaign Reports';
    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    /**
     * Disable form creation and editing, only allow viewing the chart.
     */
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\View::make('components.charts.campaign_performance') // Add chart component
                ->data([
                    'clicks' => $form->getRecord()->clicks,    // Fetch the record's clicks
                    'opens' => $form->getRecord()->opens,      // Fetch the record's opens
                    'conversions' => $form->getRecord()->conversions,  // Fetch the record's conversions
                ]),
        ]);
    }

    /**
     * Display the table without the option to create or edit.
     */
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // TextColumn::make('id')->label('ID')->sortable(),
                // TextColumn::make('campaign.title')->label('Campaign')->sortable()->searchable(),
                TextColumn::make('clicks')->label('Clicks')->sortable(),
                TextColumn::make('opens')->label('Opens')->sortable(),
                TextColumn::make('conversions')->label('Conversions')->sortable(),
                TextColumn::make('report_date')
                    ->label('Report Date')
                    ->date() // Format the date
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime() // Format date and time
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Only allow viewing the record
                // Remove Edit and Delete actions
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Allow bulk delete if needed
                ]),
            ]);
    }

    /**
     * Pages to define routes for listing and viewing campaign reports.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampaignReports::route('/'), // List reports
            // 'view' => Pages\ViewCampaignReport::route('/{record}'), // View report and charts
        ];
    }
}
