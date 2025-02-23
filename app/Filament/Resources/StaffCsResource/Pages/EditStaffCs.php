<?php

namespace App\Filament\Resources\StaffCsResource\Pages;

use App\Filament\Resources\StaffCsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffCs extends EditRecord
{
    protected static string $resource = StaffCsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
