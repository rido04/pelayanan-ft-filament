<?php

namespace App\Filament\Resources\PelayananResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PelayananResource;
use App\Filament\Resources\PelayananResource\Widgets\PelayananChart;

class ListPelayanans extends ListRecords
{
    protected static string $resource = PelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PelayananChart::class,
        ];
    }
}
