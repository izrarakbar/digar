<?php

namespace App\Filament\Resources\SuratNotulenResource\Pages;

use App\Filament\Resources\SuratNotulenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratNotulen extends EditRecord
{
    protected static string $resource = SuratNotulenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
