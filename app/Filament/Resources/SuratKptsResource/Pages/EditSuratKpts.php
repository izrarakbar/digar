<?php

namespace App\Filament\Resources\SuratKptsResource\Pages;

use App\Filament\Resources\SuratKptsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratKpts extends EditRecord
{
    protected static string $resource = SuratKptsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
