<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use App\Notifications\UserSuspendedNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'icon-users';

    protected static ?string $navigationGroup = 'Users';

    protected static ?int $navigationSort = 10;

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
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8),
                Forms\Components\Toggle::make('is_suspended')
                    ->label('Suspend User'),
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
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'manager' => 'Marketer',
                        'user' => 'Viewer',
                    ]),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\ActionGroup::make([
                    Actions\DeleteAction::make(),
                    Action::make('Toggle Suspension')
                        ->label(fn(User $record) => $record->is_suspended ? 'Unsuspend' : 'Suspend')
                        ->action(function (User $record, array $data) {
                            if (!$record->is_suspended) {
                                $record->suspension_reason = $data['suspension_reason'];
                                $record->is_suspended = true;

                                User::find($record->id)->notify(new UserSuspendedNotification($data['suspension_reason']));
                            } else {
                                $record->is_suspended = false;
                                $record->suspension_reason = null;
                            }

                            $record->save();

                            Notification::make()
                                ->success()
                                ->title($record->is_suspended ? 'User suspended' : 'User unsuspended')
                                ->icon('heroicon-o-document-text')
                                ->body(
                                    '{$user.name} has been '.($record->is_suspended ? 'suspended' : 'unsuspended').' successfully.',
                                )
                                ->send();
                        })
                        ->form([
                            Forms\Components\Textarea::make('suspension_reason')
                                ->label('Reason for Suspension')
                                ->required(fn(User $record) => !$record->is_suspended)
                                ->maxLength(500)
                                ->placeholder('Please state the reason for suspension here...')
                                ->visible(fn(User $record) => !$record->is_suspended),
                        ])
                        ->requiresConfirmation(fn(User $record) => $record->is_suspended)
                        ->modalHeading('Confirmation Needed!!')
                        ->modalButton('Yes ')
                        ->hidden(fn(User $record) => $record->role === 'admin'), // Hide if the user is an admin
                ])->icon('icon-more-actions')
                    ->size('sm')
                ->button(),
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

    protected static ?string $recordTitleAttribute = 'name';
}
