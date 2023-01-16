<?php

namespace App\Filament\Widgets;

use App\Models\Vtunggakan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\Auth;

class VtunggakanResource extends BaseWidget
{
    protected function getCards(): array
    {
        if (Auth::user()->hasRole(['admin', 'kakap', 'kasip3', 'pelp3'])) {
            return [
                Card::make('Total Tunggakan Pemeriksaan', Vtunggakan::whereNotNull('spv1')->count()),
                Card::make('Tunggakan Sudah Alokasi Belum Terbit SP2', Vtunggakan::where('is_alokasi_nosp2', true)->count()),
                Card::make('Tunggakan Sudah Isi Komitmen', Vtunggakan::where('fg_komitmen', true)->count()),
                Card::make('Jumlah Tunggakan Pemeriksaan Target SPHP Melebihi Komitmen', Vtunggakan::where('is_sphp_lewat', true)->count()),
                Card::make('Jumlah Pemeriksaan Sudah Terbit SPHP', Vtunggakan::where('is_sphp', true)->count()),
            ];
        } else {
            return [];
        }
    }
}
