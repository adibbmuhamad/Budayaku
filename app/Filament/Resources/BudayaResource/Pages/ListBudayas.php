<?php

namespace App\Filament\Resources\BudayaResource\Pages;

use App\Filament\Resources\BudayaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBudayas extends ListRecords
{
    protected static string $resource = BudayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
