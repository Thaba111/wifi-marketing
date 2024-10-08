<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\RelationManagers\ContactSegmentsRelationManager;
// use App\Filament\Resources\ContactResource\RelationManagers\SegmentRelationManager; 
use App\Models\Contact;
use App\Models\Segment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\ContactResource\Pages;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use App\Filament\Imports\ContactImporter;
use Filament\Tables\Actions\ImportAction;
use App\Imports\ContactsImport;






class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Contacts';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Forms\Components\Select::make('segment_id')
            //     ->label('Segment')
            //     ->hiddenOn('edit')
            //     ->searchable()
            //     ->columnSpanFull()
            //     ->options(fn () => Segment::pluck('name', 'id'))
            //     ->required(),
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->unique(Contact::class, 'email', ignorable: fn ($record) => $record),
            Forms\Components\TextInput::make('phone_number')
                ->required()
                ->maxLength(20),
            Forms\Components\TextInput::make('location')
                ->nullable()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone_number')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->wrap()
                    ->sortable()->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),

             ])
            ->headerActions([
                // Import button
//                Tables\Actions\Action::make('import')
//                    ->label('Import Contacts')
//                    ->url(route('contacts.import'))
//                    ->importer(ContactImporter::class)
//                    ->color('success'),

                ImportAction::make('import')
                    ->label('Import Contacts')
                    ->importer(ContactImporter::class),
    
                // Export button
                Tables\Actions\Action::make('export')
                    ->label('Export Contacts')
                    ->url(route('contacts.export'))
                    ->color('primary'),
                
            
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ContactSegmentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }

    public static function importContacts(Request $request)
{
    // Validate the incoming request for the file
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv',
    ]);

    // Import logic here, e.g., using Laravel Excel
    Excel::import(new ContactsImport, $request->file('file'));

    return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully!');
}

public static function exportContacts()
{
    // Export logic here, e.g., using Laravel Excel
    return Excel::download(new ContactsExport, 'contacts.xlsx');
}

}
