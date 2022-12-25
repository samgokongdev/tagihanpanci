<?php

namespace App\Filament\Widgets;

use App\Models\Vtunggakan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class VtunggakanResource extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Tunggakan Pemeriksaan', Vtunggakan::count()),
            Card::make('Tunggakan Sudah Isi Komitmen', Vtunggakan::where('fg_komitmen', true)->count()),
            Card::make('Jumlah Pemeriksaan Sudah Terbit SP2', Vtunggakan::where('is_sp2', true)->count()),
            Card::make('Jumlah Pemeriksaan Sudah Terbit SPHP', Vtunggakan::where('is_sphp', true)->count()),
            
        ];
    }
}
