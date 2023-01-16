<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VtunggakanResource\Pages;
use App\Filament\Resources\VtunggakanResource\RelationManagers;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Vtunggakan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Tables\Filters\TernaryFilter;
// use App\Filament\Resources\FilamentExportBulkAction
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VtunggakanResource extends Resource
{
    protected static ?string $model = Vtunggakan::class;

    protected static ?string $navigationIcon = 'heroicon-o-table';

    protected static ?string $navigationLabel = 'Tunggakan Pemeriksaan';

    protected static ?string $navigationGroup = 'Pengawasan Pemeriksaan';





    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('np2')
                    ->disabled()
                    ->label('NP2')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tgl_np2')
                    ->label('TANGGAL NP2')
                    ->disabled(),
                Forms\Components\TextInput::make('up2')
                    ->label('UP2')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('npwp')
                    ->label('NPWP')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('nama_wp')
                    ->label('NAMA WP')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('kode_rik')
                    ->label('KODE PEMERIKSAAN')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('periode_1')
                    ->label('PERIODE AWAL')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('periode_2')
                    ->label('PERIODE AKHIR')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('masa_pajak')
                    ->label('MASA PAJAK')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('th_pajak')
                    ->label('TAHUN PAJAK')
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('sp2')
                    ->maxLength(255)
                    ->label('SP2')
                    ->disabled(),
                Forms\Components\DatePicker::make('tgl_sp2')
                    ->label('TANGGAL SP2')
                    ->disabled(),
                Forms\Components\DatePicker::make('tgl_sppl')
                    ->label('TANGGAL SPPL')
                    ->disabled(),
                Forms\Components\TextInput::make('sphp')
                    ->maxLength(255)
                    ->label('SPHP')
                    ->disabled(),
                Forms\Components\DatePicker::make('tgl_sphp')
                    ->label('TANGGAL SPHP')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('spv1')
                    ->label('SUPERVISOR')
                    ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('pic1')
                    ->label('FPP PIC')
                    ->toggleable()
                    ->size('sm'),
                // Tables\Columns\TextColumn::make('tgl_np2')
                //     ->label('TANGGAL NP2')
                //     ->date('d-m-Y')
                //     ->toggleable(isToggledHiddenByDefault: false)
                //     ->size('sm'),
                Tables\Columns\TextColumn::make('npwp')
                    ->label('NPWP')
                    ->searchable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('nama_wp')
                    ->label('NAMA WP')
                    // ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->size('sm'),
                // Tables\Columns\TextColumn::make('nama_wp2')
                //     ->label('NAMA WP (KECIL)')
                //     // ->hidden()
                //     // ->sortable()
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true)
                //     ->size('sm'),
                Tables\Columns\TextColumn::make('kode_rik')
                    ->label('KODE')
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('periode_1')
                    ->label('PERIODE 1')
                    ->size('sm')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('periode_2')
                    ->label('PERIODE 2')
                    ->size('sm')
                    ->toggleable(),
                // Tables\Columns\TextColumn::make('masa_pajak')
                //     ->label('MASA PAJAK')
                //     ->toggleable()
                //     ->size('sm'),
                // Tables\Columns\TextColumn::make('th_pajak')
                //     ->label('TAHUN PAJAK')
                //     ->toggleable()
                //     ->size('sm'),
                Tables\Columns\TextColumn::make('sp2')
                    ->label('SP2')
                    ->searchable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('tgl_sp2')
                    ->label('TANGGAL SP2')
                    ->date('d-m-Y')
                    ->toggleable()
                    ->sortable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('komitmens.max_sp2')
                    ->label('TARGET TERBIT SP2')
                    ->date('d-m-Y')
                    ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('tgl_sppl')
                    ->label('TANGGAL SPPL')
                    ->date('d-m-Y')
                    ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('sphp')
                    ->label('SPHP')
                    ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('tgl_sphp')
                    ->label('TANGGAL SPHP')
                    ->date('d-m-Y')
                    ->toggleable()
                    ->size('sm')
                    ->sortable(),

                // Tables\Columns\TextColumn::make('komitmens.max_permdok')
                //     ->label('TARGET PERMINTAAN DOKUMEN')
                //     ->date('d-m-Y')
                //     ->sortable()
                //     ->toggleable()
                //     ->size('sm'),
                // Tables\Columns\TextColumn::make('komitmens.max_pengujian1')
                //     ->label('TARGET PENGUJIAN TAHAP 1')
                //     ->date('d-m-Y')
                //     ->sortable()
                //     ->toggleable()
                //     ->size('sm'),
                Tables\Columns\TextColumn::make('komitmens.max_pengujian2')
                    ->label('TARGET TERBIT SPHP')
                    ->date('d-m-Y')
                    ->sortable()
                    ->toggleable()
                    ->size('sm'),
                // Tables\Columns\TextColumn::make('komitmens.max_lhp')
                //     ->label('TARGET TERBIT LHP')
                //     ->date('d-m-Y')
                //     ->sortable()
                //     ->toggleable()
                //     ->size('sm'),

                // Tables\Columns\TextColumn::make('ang1_1')
                //     ->label('ANGGOTA 1')
                //     ->toggleable()
                //     ->size('sm'),
                // Tables\Columns\TextColumn::make('ang2_1')
                //     ->label('ANGGOTA 2')
                //     ->toggleable()
                //     ->size('sm'),
                // Tables\Columns\TextColumn::make('kt1')
                //     ->label('KETUA TIM')
                //     ->toggleable()
                //     ->size('sm'),
                Tables\Columns\TextColumn::make('np2')
                    ->label('NP2')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->size('sm'),
            ])
            ->filters([
                // SelectFilter::make('nama_wp')
                //     ->multiple()
                //     ->label('Nama Wajib Pajak')
                //     ->options(
                //         Vtunggakan::orderBy('nama_wp', 'asc')->pluck('nama_wp', 'nama_wp')
                //     ),
                // SelectFilter::make('kode_rik')
                //     ->multiple()
                //     ->label('Kode Pemeriksaan')
                //     ->options(
                //         Vtunggakan::orderBy('kode_rik', 'asc')->pluck('kode_rik', 'kode_rik')
                //     ),
                // SelectFilter::make('masa_pajak')
                //     ->multiple()
                //     ->label('Masa Pajak')
                //     ->options(
                //         Vtunggakan::orderBy('masa_pajak', 'asc')->pluck('masa_pajak', 'masa_pajak')
                //     ),
                // SelectFilter::make('th_pajak')
                //     ->multiple()
                //     ->label('Tahun Pajak')
                //     ->options(
                //         Vtunggakan::orderBy('th_pajak', 'asc')->pluck('th_pajak', 'th_pajak')
                //     ),
                TernaryFilter::make('fg_komitmen')
                    ->placeholder('Semua')
                    ->trueLabel('Sudah Isi Komitmen')
                    ->falseLabel('Belum Isi Komitmen')
                    ->label('Cek Komitmen'),

                TernaryFilter::make('belum_sppl')
                    ->placeholder('Semua')
                    ->trueLabel('Belum Input SPPL')
                    ->falseLabel('Sudah Input SPPL')
                    ->label('Cek Penyampaian SP2 (SPPL)'),
                // TernaryFilter::make('is_sp2')
                //     ->placeholder('Semua')
                //     ->trueLabel('Terbit SP2')
                //     ->falseLabel('Belum Terbit SP2')
                //     ->label('Cek SP2'),
                TernaryFilter::make('is_sphp')
                    ->placeholder('Semua')
                    ->trueLabel('Terbit SPHP')
                    ->falseLabel('Belum Terbit SPHP')
                    ->label('Cek SPHP'),
                // TernaryFilter::make('fg_sp2')
                //     ->placeholder('Semua')
                //     ->trueLabel('Ya')
                //     ->falseLabel('Tidak')
                //     ->label('Target SP2 < 7 Hari?'),
                TernaryFilter::make('fg_sphp')
                    ->placeholder('Semua')
                    ->trueLabel('Ya')
                    ->falseLabel('Tidak')
                    ->label('Target SPHP < 14 Hari?'),
                // TernaryFilter::make('fg_lhp')
                //     ->placeholder('Semua')
                //     ->trueLabel('Ya')
                //     ->falseLabel('Tidak')
                //     ->label('Target LHP < 14 Hari?'),
                TernaryFilter::make('is_alokasi_nosp2')
                    ->placeholder('Semua')
                    ->trueLabel('Ya')
                    ->falseLabel('Tidak')
                    ->label('Sudah Alokasi Tapi Belum Terbit SP2?'),
                TernaryFilter::make('pic_not_set')
                    ->placeholder('Semua')
                    ->trueLabel('Ya')
                    ->falseLabel('Tidak')
                    ->label('PIC Belum Di Set?'),
                SelectFilter::make('spv1')
                    ->options(
                        Vtunggakan::whereNotNull('spv1')->orderBy('spv1', 'asc')->pluck('spv1', 'spv1')
                    )
                    ->label('SUPERVISOR'),
                SelectFilter::make('kt1')
                    ->options(
                        Vtunggakan::whereNotNull('kt1')->orderBy('kt1', 'asc')->pluck('kt1', 'kt1')
                    )
                    ->label('KETUA TIM'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                // FilamentExportHeaderAction::make('export')
                //     ->timeFormat('d-m-Y')
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                // FilamentExportBulkAction::make('export')
                //     ->timeFormat('d-m-Y')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\KomitmensRelationManager::class,
            RelationManagers\ManualfppsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVtunggakans::route('/'),
            'create' => Pages\CreateVtunggakan::route('/create'),
            'edit' => Pages\EditVtunggakan::route('/{record}/edit'),
        ];
    }
}
