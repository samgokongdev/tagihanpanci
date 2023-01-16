<?php

namespace App\Filament\Resources;

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
                Tables\Columns\TextColumn::make('lhp')
                    ->label('NOMOR LHP')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('tgl_lhp')
                    ->label('NOMOR LHP')
                    ->date('d-M-Y')
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
            ])
            ->actions([
                Tables\Actions\EditAction::make()->hidden(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->hidden(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VskpsRelationManager::class,
            RelationManagers\KomitmensRelationManager::class,
            RelationManagers\ManualfppsRelationManager::class,
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
