<?php

namespace App\Filament\Resources\VsptResource\Pages;

use App\Filament\Resources\VsptResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Layout;

class ListVspts extends ListRecords
{
    protected static string $resource = VsptResource::class;

    protected static ?string $title = 'Pengawasan SPTLB Restitusi Masuk';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->hidden(),
        ];
    }

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    protected function getTableFiltersFormColumns(): int
    {
        return 4;
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }
}
