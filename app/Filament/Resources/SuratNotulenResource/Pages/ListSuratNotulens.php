<?php

namespace App\Filament\Resources\SuratNotulenResource\Pages;

use App\Filament\Resources\SuratNotulenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratNotulens extends ListRecords
{
    protected static string $resource = SuratNotulenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
