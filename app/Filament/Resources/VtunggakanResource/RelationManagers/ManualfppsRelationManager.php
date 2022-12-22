<?php

namespace App\Filament\Resources\VtunggakanResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManualfppsRelationManager extends RelationManager
{
    protected static string $relationship = 'manualfpps';

    protected static ?string $recordTitleAttribute = 'Daftar Fungsional Pemeriksa';

    protected static ?string $title = 'Daftar Pemeriksa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('spv')
                    ->label('Supervisor')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('jt_manual')
                    ->label('Jatuh Tempo (Manual)'),
                Forms\Components\TextInput::make('kt')
                    ->label('Ketua Tim')
                    ->maxLength(255),
                Forms\Components\TextInput::make('k1')
                    ->label('Kontribusi Ketua Tim')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ang1')
                    ->label('Anggota 1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('k2')
                    ->label('Kontribusi Anggota 1')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ang2')
                    ->label('Anggota 1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('k3')
                    ->label('Kontribusi Anggota 2')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pic')
                    ->label('FPP PIC')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                Tables\Columns\TextColumn::make('jt_manual')
                    ->label('Jatuh Tempo')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Input Data FPP'),
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
