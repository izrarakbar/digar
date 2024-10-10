<?php

namespace App\Filament\Resources\SuratSeResource\Pages;

use App\Filament\Resources\SuratSeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratSes extends ListRecords
{
    protected static string $resource = SuratSeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
