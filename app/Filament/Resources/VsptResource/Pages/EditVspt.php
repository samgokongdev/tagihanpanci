<?php

namespace App\Filament\Resources\VsptResource\Pages;

use App\Filament\Resources\VsptResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVspt extends EditRecord
{
    protected static string $resource = VsptResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
