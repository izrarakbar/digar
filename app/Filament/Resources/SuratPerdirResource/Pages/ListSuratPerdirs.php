<?php

namespace App\Filament\Resources\SuratPerdirResource\Pages;

use App\Filament\Resources\SuratPerdirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratPerdirs extends ListRecords
{
    protected static string $resource = SuratPerdirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
