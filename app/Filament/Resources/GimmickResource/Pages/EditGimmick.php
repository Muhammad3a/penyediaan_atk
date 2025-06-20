<?php

namespace App\Filament\Resources\GimmickResource\Pages;

use App\Filament\Resources\GimmickResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGimmick extends EditRecord
{
    protected static string $resource = GimmickResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
