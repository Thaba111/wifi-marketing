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
use Filament\Notifications\Notification;



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
                Action::make('Toggle Suspension')
                    ->label(fn (User $record) => $record->is_suspended ? 'Unsuspend' : 'Suspend')
                    ->action(function (User $record, array $data) {
                        // Prevent suspension of admin users
                        if ($record->role === 'admin') {
                            throw new \Exception('Admin users cannot be suspended.');
                        }
            
                        // If the user is being suspended
                        if (!$record->is_suspended) {
                            if (!isset($data['suspension_reason'])) {
                                throw new \Exception('Suspension reason is required.');
                            }
                            $record->suspension_reason = $data['suspension_reason'];
                            $record->is_suspended = true;
                        } else {
                            // If the user is being unsuspended
                            $record->is_suspended = false;
                            $record->suspension_reason = null; 
                        }
            
                        $record->save();
            
                        // Notification based on the action
                        Notification::make()
                            ->success()
                            ->title($record->is_suspended ? 'User suspended' : 'User unsuspended')
                            ->body('The user has been ' . ($record->is_suspended ? 'suspended' : 'unsuspended') . ' successfully.')
                            ->send();
                    })
                    ->form([
                        Forms\Components\Textarea::make('suspension_reason')
                            ->label('Reason for Suspension')
                            ->required(fn (User $record) => !$record->is_suspended) 
                            ->maxLength(500)
                            ->placeholder('Please state the reason for suspension here...')
                            ->visible(fn (User $record) => !$record->is_suspended), 
                    ])
                    ->requiresConfirmation(fn (User $record) => $record->is_suspended) 
                    ->modalHeading('Confirm Suspension')
                    ->modalButton('Yes, Suspend')
                    ->hidden(fn (User $record) => $record->role === 'admin'), // Hide if the user is an admin
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
