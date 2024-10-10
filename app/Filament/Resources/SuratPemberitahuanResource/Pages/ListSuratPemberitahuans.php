<?php

namespace App\Filament\Resources\SuratPemberitahuanResource\Pages;

use App\Filament\Resources\SuratPemberitahuanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratPemberitahuans extends ListRecords
{
    protected static string $resource = SuratPemberitahuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
