<?php

namespace App\Filament\Resources\VlhpResource\Pages;

use App\Filament\Resources\VlhpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Layout;

class ListVlhps extends ListRecords
{
    protected static string $resource = VlhpResource::class;

    protected static ?string $title = 'Laporan Hasil Pemeriksaan';

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
