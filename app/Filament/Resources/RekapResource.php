<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Rekap;
use Filament\Forms\Form;
use App\Models\Pelayanan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\MultiSelectFilter;
use App\Filament\Resources\RekapResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RekapResource\RelationManagers;

class RekapResource extends Resource
{
    protected static ?string $model = Pelayanan::class;

    protected static ?string $navigationGroup = 'Rekap Data';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->whereNotNull('created_by'); // Pastikan hanya data yang ada creator-nya ditampilkan
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('creator.name')
                    ->label('Nama Staff')
                    ->sortable(),
                TextColumn::make('jenis_pelayanan')
                    ->label('Jenis Pelayanan')
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date(),
                TextColumn::make('jam')
                    ->label('Jam')
                    ->time(),
            ])
            ->filters([
                SelectFilter::make('creator')
                ->label('Pilih Staff yang ingin direkap')
                ->relationship('creator', 'name') // Pastikan ada relasi di Model Pelayanan
                ->searchable()
                ->preload()
                ->multiple()
            ])
            ->defaultSort('tanggal', 'desc');


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
            'index' => Pages\ListRekaps::route('/'),
            'create' => Pages\CreateRekap::route('/create'),
            'edit' => Pages\EditRekap::route('/{record}/edit'),
        ];
    }
}
