<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagihanpanciResource\Pages;
use App\Filament\Resources\TagihanpanciResource\RelationManagers;
use App\Models\Tagihanpanci;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Webbingbrasil\FilamentDateFilter\DateFilter;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;

class TagihanpanciResource extends Resource
{
    protected static ?string $model = Tagihanpanci::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Daftar Komitmen';

    protected static ?string $navigationGroup = 'Pengawasan Pemeriksaan';

    protected static ?int $navigationSort = 3;

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
                Tables\Columns\TextColumn::make('np2')
                    ->label('NP2')
                    ->copyable()
                    ->copyMessage('NP2 Disalin')
                    ->copyMessageDuration(1000)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_np2')
                    ->label('TANGGAL NP2')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('up2')
                    ->label('UP2'),
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
                Tables\Columns\TextColumn::make('sp2')
                    ->label('SP2'),
                Tables\Columns\TextColumn::make('tgl_sp2')
                    ->label('TANGGAL SP2')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('tgl_sppl')
                    ->label('TANGGAL SPPL')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('sphp')
                    ->label('SPHP'),
                Tables\Columns\TextColumn::make('tgl_sphp')
                    ->label('TANGGAL SPHP')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('spv')
                    ->label('Supervisor'),
                Tables\Columns\TextColumn::make('kt')
                    ->label('Ketua Tim'),
                Tables\Columns\TextColumn::make('ang1')
                    ->label('Anggota 1'),
                Tables\Columns\TextColumn::make('ang2')
                    ->label('Anggota 2'),
                Tables\Columns\TextColumn::make('pic')
                    ->label('FPP PIC'),
                Tables\Columns\TextColumn::make('max_sp2')
                    ->label('TARGET TERBIT SP2')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('max_permdok')
                    ->label('TARGET PERMINTAAN DOKUMEN')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('max_pengujian1')
                    ->label('TARGET PENGUJIAN TAHAP 1')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('max_pengujian2')
                    ->label('TARGET TERBIT SPHP')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('max_lhp')
                    ->label('TARGET TERBIT LHP')
                    ->date('d-m-Y'),
            ])
            ->filters([
                DateFilter::make('max_sp2')
                    ->label('Target SP2')
                    ->range(),
                DateFilter::make('max_permdok')
                    ->label('Target Permintaan Dok')
                    ->range(),
                DateFilter::make('max_pengujian1')
                    ->label('Target Pengujian 1')
                    ->range(),
                DateFilter::make('max_pengujian2')
                    ->label('Target Terbit SPHP')
                    ->range(),
                DateFilter::make('max_lhp')
                    ->label('Target Terbit LHP')
                    ->range(),
                SelectFilter::make('kode_rik')
                    ->multiple()
                    ->label('Kode Pemeriksaan')
                    ->options(
                        Tagihanpanci::orderBy('kode_rik', 'asc')->pluck('kode_rik', 'kode_rik')
                    ),
                SelectFilter::make('masa_pajak')
                    ->multiple()
                    ->label('Masa Pajak')
                    ->options(
                        Tagihanpanci::orderBy('masa_pajak', 'asc')->pluck('masa_pajak', 'masa_pajak')
                    ),
                SelectFilter::make('th_pajak')
                    ->multiple()
                    ->label('Tahun Pajak')
                    ->options(
                        Tagihanpanci::orderBy('th_pajak', 'asc')->pluck('th_pajak', 'th_pajak')
                    ),

            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->timeFormat('d-m-Y')
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                FilamentExportBulkAction::make('export')
                    ->timeFormat('d-m-Y')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\KomitmensRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTagihanpancis::route('/'),
            // 'create' => Pages\CreateTagihanpanci::route('/create'),
            // 'edit' => Pages\EditTagihanpanci::route('/{record}/edit'),
        ];
    }
}
