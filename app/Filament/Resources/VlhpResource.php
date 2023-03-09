<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\VlhpResource\Pages;
use App\Filament\Resources\VlhpResource\RelationManagers;
use App\Models\Vlhp;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Webbingbrasil\FilamentCopyActions\Tables\Actions\CopyAction;
use Filament\Tables\Filters\Filter;

class VlhpResource extends Resource
{
    protected static ?string $model = Vlhp::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-report';

    protected static ?string $navigationLabel = 'Laporan Hasil Pemeriksaan';

    protected static ?string $navigationGroup = 'Monitoring Hasil Pemeriksaan';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('np2')
                    ->disabled()
                    ->label('NP2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('npwp')
                    ->disabled()
                    ->label('NPWP')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_wp')
                    ->disabled()
                    ->label('NAMA WP')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode_rik')
                    ->disabled()
                    ->label('KODE PEMERIKSAAN')
                    ->maxLength(255),
                Forms\Components\TextInput::make('periode_1')
                    ->disabled()
                    ->label('PERIODE 1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('periode_2')
                    ->disabled()
                    ->label('PERIODE 2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lhp')
                    ->disabled()
                    ->label('NOMOR LHP')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tgl_lhp')
                    ->disabled()
                    ->label('TANGGAL LHP'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('np2')
                    ->label('NP2')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('NP2 Dicopy')
                    ->copyMessageDuration(1500)
                    ->size('sm'),
                Tables\Columns\TextColumn::make('npwp')
                    ->label('NPWP')
                    ->searchable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('nama_wp')
                    ->label('NAMA WP')
                    ->searchable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('kode_rik')
                    ->label('KODE')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('periode_1')
                    ->label('PERIODE 1')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('periode_2')
                    ->label('PERIODE 2')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('sp2')
                    ->label('NOMOR SP2')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('tgl_sp2')
                    ->label('TANGGAL SP2')
                    ->date('d/m/Y')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('tgl_sppl')
                    ->label('TANGGAL SPPL')
                    ->date('d/m/Y')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('lhp')
                    ->label('NOMOR LHP')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('tgl_lhp')
                    ->label('TANGGAL LHP')
                    ->sortable()
                    ->date('d/m/Y')
                    ->size('sm'),
                TextColumn::make('jumlah_skplb_idr')
                    ->money('idr', true)
                    ->label('JUMLAH SKPLB'),
                TextColumn::make('jumlah_skpstp')
                    ->money('idr', true)
                    ->label('JUMLAH SKPKB&STP'),
                TextColumn::make('jumlah_skpstp_dibayar')
                    ->money('idr', true)
                    ->label('SKPKB&STP CAIR'),
                TextColumn::make('spv')
                    ->label('SUPERVISOR'),
                TextColumn::make('kt')
                    ->label('KETUA TIM'),
                TextColumn::make('ang1')
                    ->label('ANGGOTA'),
                TextColumn::make('ang2')
                    ->label('ANGGOTA'),
                TextColumn::make('status_konversi')
                    ->label('STATUS'),
                TextColumn::make('nilai_konversi')
                    ->label('KONVERSI'),
            ])
            ->filters([
                SelectFilter::make('tahun_lhp')
                    ->options(
                        Vlhp::orderBy('tahun_lhp', 'desc')->pluck('tahun_lhp', 'tahun_lhp')
                    )
                    ->label('TAHUN LHP'),
                SelectFilter::make('kode_rik')
                    ->label('Kode Pemeriksaan')
                    ->options(
                        Vlhp::orderBy('kode_rik', 'asc')->pluck('kode_rik', 'kode_rik')
                    ),
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Tanggal LHP Awal'),
                        Forms\Components\DatePicker::make('created_until')->label('Tanggal LHP Akhir'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tgl_lhp', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tgl_lhp', '<=', $date),
                            );
                    }),
                SelectFilter::make('status_konversi')
                    ->label('STATUS')
                    ->options(
                        Vlhp::orderBy('status_konversi', 'asc')->pluck('status_konversi', 'status_konversi')
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->hidden()
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->fileName('Data Laporan Hasil Pemeriksaan')
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make()->hidden(),
                FilamentExportBulkAction::make('export')
                    ->fileName('Data Laporan Hasil Pemeriksaan')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VskpsRelationManager::class,
            RelationManagers\KomitmensRelationManager::class,
            RelationManagers\ManualfppsRelationManager::class,
            RelationManagers\ArsiplhpsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVlhps::route('/'),
            // 'create' => Pages\CreateVlhp::route('/create'),
            'edit' => Pages\EditVlhp::route('/{record}/edit'),
        ];
    }
}
