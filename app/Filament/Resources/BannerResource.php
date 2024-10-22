<?php

namespace App\Filament\Resources;


use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Models\BannerImpression;
use Illuminate\Support\Facades\Log;



class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Banners';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image_url')
                    ->label('Banner Image')
                    ->required(),
                TextInput::make('target_url')
                    ->label('Target URL')
                    ->required(),
                Select::make('page_location')
                    ->label('Page Location')
                    ->options([
                        'homepage' => 'Homepage',
                        'checkout' => 'Checkout Page',
                        // Add more locations as needed
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('title')->label('Title')->sortable()->searchable(),
                TextColumn::make('page_location')->label('Page Location')->sortable(),
                TextColumn::make('created_at')->label('Created At')->sortable(),
                TextColumn::make('updated_at')->label('Updated At')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                ->action(function (Banner $record) {
                    // Record the click on the impression
                    self::recordClick($record); // Call the method we added
                    // Now proceed to the view action, e.g., redirecting to the target URL
                    return redirect($record->target_url); // Redirect to the target URL
                }),
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

    public static function getActions(): array
    {
        return [
            // Existing actions...
            Tables\Actions\Action::make('Record Click')
                ->action(function (Banner $record) {
                    // This method will be called when the button is clicked
                    $this->recordClick($record);
                })
                ->icon('heroicon-o-eye'), // You can change the icon
        ];
    }

    protected function recordClick(Banner $banner)
{
    Log::info('recordClick method called for banner ID: ' . $banner->id); 

    try {
        // Find or create the impression record
        $impression = BannerImpression::firstOrNew(['banner_id' => $banner->id]);
        
        // Increment the clicks and impressions
        $impression->clicks += 1;
        $impression->impressions += 1; // Increment impressions if required
        $impression->save(); // Save the record

        // Optional: Log success message
        Log::info('Banner impression recorded successfully.', [
            'banner_id' => $banner->id,
            'clicks' => $impression->clicks,
        ]);
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Failed to record banner impression.', [
            'banner_id' => $banner->id,
            'error' => $e->getMessage(),
        ]);
    }
}



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
