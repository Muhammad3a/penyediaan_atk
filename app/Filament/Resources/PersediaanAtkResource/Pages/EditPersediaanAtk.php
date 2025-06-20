<?php

namespace App\Filament\Resources\PersediaanAtkResource\Pages;

use App\Filament\Resources\PersediaanAtkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersediaanAtk extends EditRecord
{
    protected static string $resource = PersediaanAtkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
