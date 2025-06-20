<?php

namespace App\Filament\Resources\GimmickResource\Pages;

use App\Filament\Resources\GimmickResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGimmick extends CreateRecord
{
    protected static string $resource = GimmickResource::class;

     protected function getRedirectUrl(): string
    {
        // Mengarahkan ke halaman daftar setelah berhasil membuat data
        return $this->getResource()::getUrl('index');
    }
}
