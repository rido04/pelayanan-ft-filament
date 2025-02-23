<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\StaffCs;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StaffCsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StaffCsResource\RelationManagers;

class StaffCsResource extends Resource
{
    protected static ?string $model = StaffCs::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $label ='Kelola Staff CS';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->required()
                ->label('Nama'),
                TextInput::make('email')
                ->required()
                ->email()
                ->label('Email'),
                TextInput::make('password')
                ->required()
                ->password()
                ->label('Password'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Nama CS'),
                TextColumn::make('email')
                ->label('Email'),
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
