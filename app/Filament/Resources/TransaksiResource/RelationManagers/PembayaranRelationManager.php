<?php

namespace App\Filament\Resources\TransaksiResource\RelationManagers;

use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Transaksi;
class PembayaranRelationManager extends RelationManager
{
    protected static string $relationship = 'pembayaran';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status_pembayaran')
                    ->options([
                    '0' => 'Belum Lunas',
                    '1' => 'Lunas',
                    ]),
                    
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nomor_pembayaran')
            ->columns([
                Tables\Columns\TextColumn::make('nomor_pembayaran'),
                Tables\Columns\TextColumn::make('jumlah_pembayaran')
                ->money('IDR', locale: 'id'),
                Tables\Columns\TextColumn::make('metode_pembayaran'),
                Tables\Columns\TextColumn::make('status_pembayaran')
                 ->formatStateUsing(fn(Pembayaran $record): string => $record->status_pembayaran == 1 ? 'Lunas' : 'Belum Lunas')
                ->color(fn(Pembayaran $record): string => $record->status_pembayaran == 1 ? 'success' : 'danger'),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}