<?php

namespace App\Filament\Resources\VtunggakanResource\Pages;

use App\Filament\Resources\VtunggakanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Layout;

class ListVtunggakans extends ListRecords
{
    protected static string $resource = VtunggakanResource::class;

    protected static ?string $title = 'Daftar Tunggakan';

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
        return 6;
    }
}
