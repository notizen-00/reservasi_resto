<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\StatusTransaksi;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Manajemen Toko';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_transaksi'),
                Tables\Columns\TextColumn::make('meja.nomor_meja')
                ->icon('heroicon-o-tv')
                ->color('primary'),
                Tables\Columns\TextColumn::make('tanggal_reservasi'),
                Tables\Columns\TextColumn::make('jam_reservasi'),
                Tables\Columns\TextColumn::make('status_transaksi')
                    // ->enum([
                    //     StatusTransaksi::Pending->value => StatusTransaksi::Pending->label(),
                    //     StatusTransaksi::Verified->value => StatusTransaksi::Verified->label(),
                    //     StatusTransaksi::Proses->value => StatusTransaksi::Proses->label(),
                    //     StatusTransaksi::Selesai->value => StatusTransaksi::Selesai->label(),
                    // ])
                    ->badge(),
                Tables\Columns\TextColumn::make('total')
                    ->money('IDR', locale: 'id'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}