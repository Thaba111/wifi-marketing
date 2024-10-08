<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SegmentResource\Pages;
use App\Filament\Resources\SegmentResource\RelationManagers;
use App\Models\Segment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SegmentResource extends Resource
{
    protected static ?string $model = Segment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Contacts';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getFormSchema());
    }

    public static function getFormSchema(): array
    {
        return [
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('age')
                    // ->multiple()
                    ->required()
                    ->options([
                        '18-24' => '18-24',
                        '25-34' => '25-34',
                        '35-44' => '35-44',
                        '45-54' => '45-54',
                        '55-64' => '55-64',
                        '65+' => '65+',
                    ]),
                Forms\Components\Select::make('interests')
                    ->required()
                    // ->multiple()
                    ->options([
                        'sports' => 'Sports',
                        'music' => 'Music',
                        'technology' => 'Technology',
                        'fashion' => 'Fashion',
                    ]),
                Forms\Components\Select::make('location')
                    ->required()
                    ->options([
                        'nairobi' => 'Nairobi',
                        'machakos' => 'Machakos'
                    ]),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('criteria')
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
            'index' => Pages\ListSegments::route('/'),
            'create' => Pages\CreateSegment::route('/create'),
            'edit' => Pages\EditSegment::route('/{record}/edit'),
        ];
    }
}
