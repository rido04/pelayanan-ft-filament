<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\StaffCs;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StaffCsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StaffCsResource\RelationManagers;

class StaffCsResource extends Resource
{
    protected static ?string $model = User::class;


    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $label ='Kelola Staff';

    public static function getEloquentQuery(): Builder
    {
        return User::query();
    }



    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
            ->label('Nama Staff')
            ->required(),
            TextInput::make('email')->email()->required(),
            Select::make('role')
                ->options([
                    'admin' => 'Admin',
                    'staff' => 'Staff CS',
                ])
                ->required(),
            TextInput::make('password')
                ->password()
                ->required()
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)), // Enkripsi password
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('name')->label('Nama Staff')->sortable()->searchable(),
            TextColumn::make('email')->label('Email')->sortable(),
            TextColumn::make('role')->label('Sebagai')->sortable(),
            TextColumn::make('created_at')->label('Bergabung')->dateTime('d M Y'),
            ])

            ->filters([
            
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStaffCs::route('/'),
            'create' => Pages\CreateStaffCs::route('/create'),
            'edit' => Pages\EditStaffCs::route('/{record}/edit'),
        ];
    }
}
