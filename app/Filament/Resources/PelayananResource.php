<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pelayanan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PelayananResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RekapResource\Widgets\RekapChart;
use App\Filament\Resources\PelayananResource\RelationManagers;

class PelayananResource extends Resource
{
    protected static ?string $model = Pelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label ='Input Pelayanan';
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('created_by', Auth::id());
    }


        public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id(); // Isi otomatis dengan ID user yang login
        return $data;
    }
    //     public static function shouldRegisterNavigation(): bool
    // {
    //     return Auth::user()->role === 'admin' || Auth::user()->role === 'staff';
    // }

        public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['created_by'] = Auth::id();
        return $data;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('created_by')->default(Auth::id()),
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
                TextColumn::make('creator.name')
                ->label('Dibuat oleh')
                ->sortable()
                ->searchable()

            ])
            ->filters([
                SelectFilter::make('jenis_pelayanan')
                ->multiple()
                ->options([
                    'Izin Keramaian' => 'Izin Keramaian',
                    'PPL' => 'PPL',
                    'PAM' => 'PAM'
            ])
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Ubah'),
                Tables\Actions\DeleteAction::make()
                ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPelayanans::route('/'),
            'create' => Pages\CreatePelayanan::route('/create'),
            'edit' => Pages\EditPelayanan::route('/{record}/edit'),
        ];
    }
}
