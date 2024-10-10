<?php

namespace App\Filament\Resources\SuratPemberitahuanResource\Pages;

use App\Filament\Resources\SuratPemberitahuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratPemberitahuan extends EditRecord
{
    protected static string $resource = SuratPemberitahuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
