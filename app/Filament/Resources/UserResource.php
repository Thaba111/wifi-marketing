<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions;
use Filament\Tables\Actions\Action;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'marketer' => 'Marketer',
                        'viewer' => 'Viewer',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('is_suspended')
                    ->label('Suspend User')
                    // ->help('Suspended users cannot access the system'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('role')
                ->sortable(),
            Tables\Columns\BooleanColumn::make('is_suspended')
                ->label('Suspended'),
            ])
            ->filters([
                // Filtering users based on their roles
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'manager' => 'Marketer',
                        'user' => 'Viewer',
                    ]),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
                Action::make('Suspend')
                    ->label(fn (User $record) => $record->is_suspended ? 'Unsuspend' : 'Suspend')
                    ->action(fn (User $record) => $record->update(['is_suspended' => !$record->is_suspended]))
                    ->requiresConfirmation()
                    ->color(fn (User $record) => $record->is_suspended ? 'success' : 'danger')
                    // ->icon(fn (User $record) => $record->is_suspended ? 'heroicon-s-check-circle' : 'heroicon-o-ban')
                    ->visible(fn (User $record) => $record->role !== 'admin'), 
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
