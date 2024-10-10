<?php

namespace App\Filament\Resources\SuratKptsResource\Pages;

use App\Filament\Resources\SuratKptsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKpts extends ListRecords
{
    protected static string $resource = SuratKptsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
