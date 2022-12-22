<?php

namespace App\Filament\Resources\TagihanpanciResource\Pages;

use App\Filament\Resources\TagihanpanciResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Layout;

class ListTagihanpancis extends ListRecords
{
    protected static string $resource = TagihanpanciResource::class;

    protected static ?string $title = 'Daftar Komitmen Penyelesaian Pemeriksaan';

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
}
