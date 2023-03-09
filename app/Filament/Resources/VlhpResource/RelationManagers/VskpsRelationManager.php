<?php

namespace App\Filament\Resources\VlhpResource\RelationManagers;

use App\Models\Vskp;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VskpsRelationManager extends RelationManager
{
    protected static string $relationship = 'vskps';

    // protected static ?string $recordTitleAttribute = 'Daftar SKP';
    protected static ?string $recordTitleAttribute = 'Daftar SKP Terkait';
    protected static ?string $title = 'Daftar SKP Terkait';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Daftar SKP')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_ket')
                    ->label('NOMOR SKP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_skp')
                    ->label('NOMOR SKP')
                    ->date('d-M-Y'),
                Tables\Columns\TextColumn::make('jns_skp')
                    ->label('JENIS SKP'),
                Tables\Columns\TextColumn::make('pasal_skp')
                    ->label('PASAL SKP'),
                Tables\Columns\TextColumn::make('masa_1')
                    ->label('MASA'),
                Tables\Columns\TextColumn::make('masa_2')
                    ->label('MASA'),
                Tables\Columns\TextColumn::make('tahun_pajak')
                    ->label('TAHUN'),
                Tables\Columns\TextColumn::make('jumlah_ket_rupiah')
                    ->money('idr', true)
                    ->label('NILAI KETETAPAN'),
                Tables\Columns\TextColumn::make('jumlah_ket_disetujui_rupiah')
                    ->money('idr', true)
                    ->label('NILAI DISETUJUI'),
                Tables\Columns\TextColumn::make('jumlah_dibayar')
                    ->money('idr', true)
                    ->label('NILAI CAIR'),
            ])
            ->filters([
                // SelectFilter::make('jns_skp')
                //     ->options(
                //         Vskp::pluck('jns_skp', 'jns_skp')
                //     )
                //     ->label('JENIS SKP'),
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
