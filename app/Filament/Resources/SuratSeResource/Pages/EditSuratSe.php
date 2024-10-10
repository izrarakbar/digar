<?php

namespace App\Filament\Resources\SuratSeResource\Pages;

use App\Filament\Resources\SuratSeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratSe extends EditRecord
{
    protected static string $resource = SuratSeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
