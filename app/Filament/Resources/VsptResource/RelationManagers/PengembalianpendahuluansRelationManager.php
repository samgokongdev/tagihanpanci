<?php

namespace App\Filament\Resources\VsptResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class PengembalianpendahuluansRelationManager extends RelationManager
{
    protected static string $relationship = 'pengembalianpendahuluans';

    protected static ?string $recordTitleAttribute = 'Pengembalian Pendahuluan';
    protected static ?string $title = 'Pengembalian Pendahuluan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('status_permohonan')
                //     ->label('STATUS PERMOHONAN')
                //     ->required()
                //     ->maxLength(255),
                Select::make('status_permohonan')
                    ->options([
                        'proses' => 'PROSES',
                        'terima' => 'TERIMA',
                        'tolak' => 'TOLAK',
                    ])
                    ->default('proses')
                    ->disablePlaceholderSelection()
                    ->label('STATUS PERMOHONAN'),
                Forms\Components\TextInput::make('catatan')
                    ->label('CATATAN')
                    // ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status_permohonan')->label('STATUS'),
                Tables\Columns\TextColumn::make('catatan')->label('CATATAN'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
