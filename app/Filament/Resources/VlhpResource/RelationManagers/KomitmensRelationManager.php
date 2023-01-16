<?php

namespace App\Filament\Resources\VlhpResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomitmensRelationManager extends RelationManager
{
    protected static string $relationship = 'komitmens';

    protected static ?string $recordTitleAttribute = 'Komitmen Penyelesaian Pemeriksaan';
    protected static ?string $title = 'Komitmen Penyelesaian Pemeriksaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Daftar Pemeriksa')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('max_sp2')
                    ->label('Target SP2')
                    ->date(),
                Tables\Columns\TextColumn::make('max_permdok')
                    ->label('Target Permintaan Dokumen')
                    ->date(),
                Tables\Columns\TextColumn::make('max_pengujian1')
                    ->label('Target Pengujian Tahap 1')
                    ->date(),
                Tables\Columns\TextColumn::make('max_pengujian2')
                    ->label('Target Terbit SPHP')
                    ->date(),
                Tables\Columns\TextColumn::make('max_lhp')
                    ->label('Target Terbit LHP')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
