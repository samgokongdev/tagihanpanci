<?php

namespace App\Filament\Widgets;

use Closure;
use App\Models\Vtunggakan;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class TargetSphpTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected static ?string $heading = 'Daftar Pemeriksaan Dengan Target SPHP Kurang Dari 14 Hari';

    protected function getTableQuery(): Builder
    {
        if (Auth::user()->hasRole(['admin', 'kakap', 'kasip3', 'pelp3'])) {
            return Vtunggakan::query()->where('fg_sphp', TRUE)->where('is_sphp_lewat', FALSE)->orderBy('spv1', 'asc');
        } else {
            return Vtunggakan::query()->where('fg_sphp', TRUE)->where('is_sphp_lewat', FALSE)->where('spv1', auth()->user()->name)->orderBy('spv1', 'asc');
        }

        // return Vtunggakan::query()->where('fg_sphp', TRUE)->orderBy('spv1', 'asc');;
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
                ->searchable(),
            // Tables\Columns\TextColumn::make('nama_wp2')
            //     ->label('NAMA WP')
            //     ->searchable()
            //     ->toggleable(isToggledHiddenByDefault: true)
            //     // ->sortable()
            //     ->searchable(),
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
            Tables\Columns\TextColumn::make('sp2')
                ->label('SP2'),
            Tables\Columns\TextColumn::make('tgl_sp2')
                ->label('TANGGAL SP2')
                ->date('d-m-Y')
                ->sortable(),
            Tables\Columns\TextColumn::make('komitmens.max_pengujian2')
                ->label('TARGET TERBIT SPHP')
                ->date('d-m-Y')
                ->sortable(),
        ];
    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate($this->getTableRecordsPerPage() == -1 ? $query->count() : $this->getTableRecordsPerPage());
    }
}
