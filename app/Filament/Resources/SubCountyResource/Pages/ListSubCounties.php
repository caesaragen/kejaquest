<?php

namespace App\Filament\Resources\SubCountyResource\Pages;

use App\Filament\Resources\SubCountyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubCounties extends ListRecords
{
    protected static string $resource = SubCountyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
