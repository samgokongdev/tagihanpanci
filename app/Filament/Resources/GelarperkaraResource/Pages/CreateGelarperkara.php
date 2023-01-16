<?php

namespace App\Filament\Resources\GelarperkaraResource\Pages;

use App\Filament\Resources\GelarperkaraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;


class CreateGelarperkara extends CreateRecord
{
    protected static ?string $title = 'Input Jadwal Gelar Perkara';

    protected static string $resource = GelarperkaraResource::class;
}
