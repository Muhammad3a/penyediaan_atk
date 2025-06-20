<?php

namespace App\Filament\Resources\PersediaanAtkResource\Pages;

use App\Filament\Resources\PersediaanAtkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePersediaanAtk extends CreateRecord
{
    protected static string $resource = PersediaanAtkResource::class;


    protected function getRedirectUrl(): string
    {
        // Mengarahkan ke halaman daftar setelah berhasil membuat data
        return $this->getResource()::getUrl('index');
    }
}
