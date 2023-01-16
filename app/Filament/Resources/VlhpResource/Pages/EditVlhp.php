<?php

namespace App\Filament\Resources\VlhpResource\Pages;

use App\Filament\Resources\VlhpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVlhp extends EditRecord
{
    protected static string $resource = VlhpResource::class;

    protected static ?string $title = 'Detail Laporan Hasil Pemeriksaan';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->hidden(),
        ];
    }
}
