<?php

namespace App\Filament\Resources\RekapResource\Pages;

use Filament\Actions;
use App\Filament\Resources\RekapResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\RekapResource\Widgets\RekapChart;

class ListRekaps extends ListRecords
{
    protected static string $resource = RekapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
           RekapChart::class,
        ];
    }
}
