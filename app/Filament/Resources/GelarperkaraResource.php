<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GelarperkaraResource\Pages;
use App\Filament\Resources\GelarperkaraResource\RelationManagers;
use App\Models\Gelarperkara;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GelarperkaraResource extends Resource
{
    protected static ?string $model = Gelarperkara::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Gelar Perkara';

    protected static ?string $navigationGroup = 'Gelar Perkara';

    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('np2')
                    ->label('NP2')
                    ->required()
                    ->maxLength(255),
                // Select::make('np2')
                //     ->relationship('vtunggakans', 'nama_wp'),
                Forms\Components\DateTimePicker::make('tgl_gp')
                    ->label('TANGGAL GELAR PERKARA')
                    ->required(),
                Forms\Components\TextInput::make('kasi')
                    ->label('KEPALA SEKSI')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ar')
                    ->label('AR')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penilai')
                    ->label('PENILAI')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penyuluh')
                    ->label('PENYULUH')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('notulen')
                    ->label('NOTULEN')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pic')
                    ->label('PIC')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tgl_gp_ubah')
                    ->label('TANGGAL GP PERUBAHAN'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('np2')
                    ->label('NP2'),
                Tables\Columns\TextColumn::make('vtunggakans.nama_wp')
                    ->label('NAMA WP'),
                Tables\Columns\TextColumn::make('vtunggakans.periode_1')
                    ->label('PERIODE 1'),
                Tables\Columns\TextColumn::make('vtunggakans.periode_2')
                    ->label('PERIODE 2'),
                Tables\Columns\TextColumn::make('tgl_gp')
                    ->dateTime()->label('TANGGAL GP'),
                Tables\Columns\TextColumn::make('vtunggakans.spv1')
                    ->label('SUPERVISOR'),
                Tables\Columns\TextColumn::make('vtunggakans.kt1')
                    ->label('KETUA TIM'),
                Tables\Columns\TextColumn::make('vtunggakans.ang1_1')
                    ->label('ANGGOTA 1'),
                Tables\Columns\TextColumn::make('vtunggakans.ang2_1')
                    ->label('ANGGOTA 2'),
                Tables\Columns\TextColumn::make('kasi')->label('KEPALA SEKSI'),
                Tables\Columns\TextColumn::make('ar')->label('AR'),
                Tables\Columns\TextColumn::make('notulen')->label('NOTULEN'),
                Tables\Columns\TextColumn::make('pic')->label('PIC'),
                Tables\Columns\TextColumn::make('tgl_gp_ubah')
                    ->dateTime()
                    ->label('TANGGAL GP PERUBAHAN'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGelarperkaras::route('/'),
            'create' => Pages\CreateGelarperkara::route('/create'),
            'edit' => Pages\EditGelarperkara::route('/{record}/edit'),
        ];
    }
}
