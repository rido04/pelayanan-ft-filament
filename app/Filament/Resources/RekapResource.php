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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Filters\MultiSelectFilter;
use App\Filament\Resources\RekapResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use App\Filament\Resources\RekapResource\RelationManagers;
use App\Filament\Resources\RekapResource\Widgets\RekapChart;

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
                    ->time()
                    ->summarize([
                Count::make()->label('Total Pelayanan')
            ]),
            ])
            ->filters([
                SelectFilter::make('creator')
                    ->label('Pilih Staff yang ingin direkap')
                    ->relationship('creator', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
                    
                Filter::make('created_between')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '<=', $date),
                            );
                    })
            ])
            ->defaultSort('tanggal', 'desc')
            ->headerActions([
                ExportAction::make()
                    ->label('Export Data')
                    ->icon('heroicon-m-arrow-down-tray'),
            ]);


    }
    public static function getWidgets(): array
    {
        return [
            RekapChart::class,
        ];
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
