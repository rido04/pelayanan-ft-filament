<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pelayanan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PelayananResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PelayananResource\RelationManagers;

class PelayananResource extends Resource
{
    protected static ?string $model = Pelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Radio::make('jenis_pelayanan')
                ->required()
                ->options([
                    'Izin Keramaian' => 'Izin Keramaian',
                    'PPL' => 'PPL',
                    'PAM' => 'PAM'
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenis_pelayanan')
                ->searchable()
                ->copyable()
                ->copyMessage('Disalin!'),
                TextColumn::make('tanggal')->date('Y-m-d')
                ->sortable()
                ->copyable()
                ->copyMessage('Disalin!'),
                TextColumn::make('jam')->time('H:i:s')
                ->sortable()
                ->copyable()
                ->copyMessage('Disalin!'),
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
            'index' => Pages\ListPelayanans::route('/'),
            'create' => Pages\CreatePelayanan::route('/create'),
            'edit' => Pages\EditPelayanan::route('/{record}/edit'),
        ];
    }
}
