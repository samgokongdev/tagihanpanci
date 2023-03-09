<?php

namespace App\Filament\Widgets;

use App\Models\Vlhp;
use App\Models\Vskp;
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
                Card::make('Tunggakan Pemeriksaan Sudah Alokasi', Vtunggakan::whereNotNull('spv1')->count()),
                Card::make('Tunggakan Sudah Alokasi Belum Terbit SP2', Vtunggakan::where('is_alokasi_nosp2', true)->count()),
                Card::make('Tunggakan Sudah Isi Komitmen', Vtunggakan::where('fg_komitmen', true)->count()),
                Card::make('Jumlah Tunggakan Pemeriksaan Target SPHP Melebihi Komitmen', Vtunggakan::where('is_sphp_lewat', true)->count()),
                Card::make('Jumlah Pemeriksaan Sudah Terbit SPHP', Vtunggakan::where('is_sphp', true)->count()),
                Card::make('Konversi LHP', round(Vlhp::where('tahun_lhp', date('Y'))->sum('nilai_konversi'), 2)),
                Card::make('SKPKB & STP Terbit (Rupiah)', number_format(Vskp::where('tahun_skp', date('Y'))->whereIn('jns_skp', ['SKPKB', 'SKPKBT', 'SKPSTP'])->sum('jumlah_ket_rupiah')), 2),
                Card::make('SKPKB & STP Terbit Dibayar (Rupiah)', number_format(Vskp::where('tahun_skp', date('Y'))->whereIn('jns_skp', ['SKPKB', 'SKPKBT', 'SKPSTP'])->sum('jumlah_dibayar')), 2),
            ];
        } else {
            return [];
        }
    }
}
