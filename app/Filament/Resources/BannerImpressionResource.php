<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerImpressionResource\Pages;
use App\Filament\Resources\BannerImpressionResource\RelationManagers;
use App\Models\BannerImpression;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;

class BannerImpressionResource extends Resource
{
    protected static ?string $model = BannerImpression::class;

    protected static ?string $navigationLabel = 'Banner Impressions';
    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('banner_id') // Assuming you want to select a banner
                ->relationship('banner', 'title'), // Assuming 'title' is a column in the banners table
            Forms\Components\TextInput::make('impressions')
                ->required(),
            Forms\Components\TextInput::make('clicks')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('banner.title')->label('Banner Title')->sortable()->searchable(),
                TextColumn::make('impressions')->label('Impressions')->sortable(),
                TextColumn::make('clicks')->label('Clicks')->sortable(),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
                TextColumn::make('updated_at')->label('Updated At')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBannerImpressions::route('/'),
            'create' => Pages\CreateBannerImpression::route('/create'),
            'edit' => Pages\EditBannerImpression::route('/{record}/edit'),
        ];
    }
}
