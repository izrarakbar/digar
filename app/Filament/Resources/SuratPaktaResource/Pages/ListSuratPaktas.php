<?php

namespace App\Filament\Resources\SuratPaktaResource\Pages;

use App\Filament\Resources\SuratPaktaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratPaktas extends ListRecords
{
    protected static string $resource = SuratPaktaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
