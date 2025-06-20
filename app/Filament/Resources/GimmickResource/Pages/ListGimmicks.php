<?php

namespace App\Filament\Resources\GimmickResource\Pages;

use App\Filament\Resources\GimmickResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGimmicks extends ListRecords
{
    protected static string $resource = GimmickResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
