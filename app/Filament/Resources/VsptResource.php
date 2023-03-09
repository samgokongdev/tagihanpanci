<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\VsptResource\Pages;
use App\Filament\Resources\VsptResource\RelationManagers;
use App\Models\Vspt;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;

class VsptResource extends Resource
{
    protected static ?string $model = Vspt::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Pengawasan SPTLB Restitusi';

    protected static ?string $navigationGroup = 'Pengawasan Tunggakan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NPWP')
                    ->disabled()
                    ->label('NPWP'),
                Forms\Components\TextInput::make('NAMA_WP')
                    ->label('NAMA_WP')
                    ->disabled(),
                Forms\Components\TextInput::make('JENIS_SPT')
                    ->label('JENIS SPT')
                    ->disabled(),
                Forms\Components\TextInput::make('PEMBETULAN')
                    ->label('JENIS SPT')
                    ->disabled(),
                Forms\Components\TextInput::make('KETERANGAN_SPT')
                    ->label('KETERANGAN SPT')
                    ->disabled(),
                Forms\Components\TextInput::make('MASA')
                    ->label('MASA PAJAK')
                    ->disabled(),
                Forms\Components\TextInput::make('TAHUN')
                    ->label('TAHUN PAJAK')
                    ->disabled(),
                Forms\Components\TextInput::make('NILAI_RES')
                    ->label('NILAI RESTITUSI')
                    ->disabled(),
                Forms\Components\DatePicker::make('TGL_TERIMA')
                    ->label('TANGGAL TERIMA')
                    ->disabled(),
                Forms\Components\DatePicker::make('JATUH_TEMPO')
                    ->label('JATUH TEMPO')
                    ->disabled(),
                Forms\Components\TextInput::make('PROGRESS_PEMERIKSAAN')
                    ->label('PROGRESS')
                    ->disabled(),
                Forms\Components\TextInput::make('KETERANGAN')
                    ->label('KETERANGAN')
                    ->disabled(),
                Forms\Components\TextInput::make('NP2_CLEAN')
                    ->label('NP2')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('NPWP')
                    ->label('NPWP')
                    ->searchable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('NAMA_WP')
                    ->label('NAMA WP')
                    // ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('JENIS_SPT')
                    ->label('JENIS SPT')
                    ->toggleable()
                    ->searchable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('PEMBETULAN')
                    ->label('PEMBETULAN')
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('KETERANGAN_SPT')
                    ->label('KETERANGAN SPT')
                    ->toggleable()
                    ->searchable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('MASA')
                    ->label('MASA')
                    // ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('TAHUN')
                    ->label('TAHUN')
                    // ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('NILAI_RES')
                    ->label('NILAI RESTITUSI')
                    ->money('idr', true),
                Tables\Columns\TextColumn::make('NO_BPS')
                    ->label('NOMOR BPS')
                    // ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('TGL_TERIMA')
                    ->label('TGL TERIMA SPT')
                    ->date('d-m-Y')
                    ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('JATUH_TEMPO')
                    ->label('JT SISTEM')
                    ->date('d-m-Y')
                    ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('NP2_CLEAN')
                    ->label('NP2')
                    // ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('PROGRESS_PEMERIKSAAN')
                    ->label('PROGRESS')
                    // ->sortable()
                    ->toggleable()
                    ->size('sm'),
                Tables\Columns\TextColumn::make('KETERANGAN')
                    ->label('KETERANGAN BERKAS')
                    ->toggleable()
                    ->size('sm'),



            ])
            ->filters([
                TernaryFilter::make('fg_progress')
                    ->placeholder('SEMUA')
                    ->trueLabel('ADA TINDAKAN PEMERIKSAAN')
                    ->falseLabel('BELUM ADA TINDAKAN PEMERIKSAAN')
                    ->label('CEK TINDAKAN PEMERIKSAAN'),
                Filter::make('TGL_TERIMA')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Tanggal Terima SPT Awal'),
                        Forms\Components\DatePicker::make('created_until')->label('Tanggal Terima SPT Akhir'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('TGL_TERIMA', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('TGL_TERIMA', '<=', $date),
                            );
                    }),
                Filter::make('JATUH_TEMPO')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('JT Pemeriksaan Awal'),
                        Forms\Components\DatePicker::make('created_until')->label('JT Pemeriksaan Akhir'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('JATUH_TEMPO', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('JATUH_TEMPO', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->fileName('Data SPTLB Restitusi')
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
                    ->fileName('Data SPTLB Restitusi')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CatatansptsRelationManager::class,
            RelationManagers\PengembalianpendahuluansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVspts::route('/'),
            'create' => Pages\CreateVspt::route('/create'),
            'edit' => Pages\EditVspt::route('/{record}/edit'),
        ];
    }
}
