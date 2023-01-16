<?php

namespace App\Filament\Widgets;

use Closure;
use App\Models\Vtunggakan;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TargetLhpTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 4;

    protected static ?string $heading = 'Daftar Pemeriksaan Dengan Target LHP Kurang Dari 14 Hari';

    protected function getTableQuery(): Builder
    {
        if (Auth::user()->hasRole(['admin', 'kakap', 'kasip3', 'pelp3'])) {
            return Vtunggakan::query()->where('fg_lhp', TRUE)->orderBy('spv1', 'asc');
        } else {
            return Vtunggakan::query()->where('fg_lhp', TRUE)->where('spv1', auth()->user()->name)->orderBy('spv1', 'asc');
        }
        // return Vtunggakan::query()->where('fg_lhp', TRUE)->orderBy('spv1', 'asc');;
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('manualfpps.spv')
                ->label('SUPERVISOR')
                ->searchable(),
            Tables\Columns\TextColumn::make('npwp')
                ->label('NPWP')
                ->searchable(),
            Tables\Columns\TextColumn::make('nama_wp')
                ->label('NAMA WP')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('kode_rik')
                ->label('KODE PEMERIKSAAN'),
            Tables\Columns\TextColumn::make('periode_1')
                ->label('PERIODE 1'),
            Tables\Columns\TextColumn::make('periode_2')
                ->label('PERIODE 2'),
            Tables\Columns\TextColumn::make('masa_pajak')
                ->label('MASA PAJAK'),
            Tables\Columns\TextColumn::make('th_pajak')
                ->label('TAHUN PAJAK'),

            Tables\Columns\TextColumn::make('komitmens.max_lhp')
                ->label('TARGET TERBIT LHP')
                ->date('d-m-Y'),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return true;
    }
}
