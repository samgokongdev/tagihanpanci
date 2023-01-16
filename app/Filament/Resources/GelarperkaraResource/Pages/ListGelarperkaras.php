<?php

namespace App\Filament\Resources\GelarperkaraResource\Pages;

use App\Filament\Resources\GelarperkaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGelarperkaras extends ListRecords
{
    protected static string $resource = GelarperkaraResource::class;

    protected static ?string $title = 'Jadwal Gelar Perkara KPP Penanaman Modal Asing Tiga';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Input Jadwal Gelar Perkara'),
        ];
    }
}
