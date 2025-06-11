<?php

namespace App\Filament\Resources\SenimanResource\Pages;

use App\Filament\Resources\SenimanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeniman extends EditRecord
{
    protected static string $resource = SenimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
