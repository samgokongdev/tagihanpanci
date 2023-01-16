<?php

namespace App\Filament\Resources\GelarperkaraResource\Pages;

use App\Filament\Resources\GelarperkaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGelarperkara extends EditRecord
{
    protected static string $resource = GelarperkaraResource::class;

    protected static ?string $title = 'Edit Jadwal Gelar Perkara';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
