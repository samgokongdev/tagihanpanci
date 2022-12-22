<?php

namespace App\Filament\Resources\TagihanpanciResource\Pages;

use App\Filament\Resources\TagihanpanciResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagihanpanci extends EditRecord
{
    protected static string $resource = TagihanpanciResource::class;

    protected static ?string $title = 'Detail Tunggakan';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->hidden(),
        ];
    }
}
