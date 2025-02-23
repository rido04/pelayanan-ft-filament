<?php

namespace App\Filament\Resources\StaffCsResource\Pages;

use App\Filament\Resources\StaffCsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffCs extends ListRecords
{
    protected static string $resource = StaffCsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
