<?php

namespace App\Filament\Resources\VtunggakanResource\Pages;

use App\Filament\Resources\VtunggakanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVtunggakan extends EditRecord
{
    protected static string $resource = VtunggakanResource::class;

    protected static ?string $title = 'Detail Tunggakan';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->hidden(),
        ];
    }
}
