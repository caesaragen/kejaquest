<?php

namespace App\Filament\Resources\SubCountyResource\Pages;

use App\Filament\Resources\SubCountyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubCounty extends EditRecord
{
    protected static string $resource = SubCountyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
