<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use App\Enums\StatusTransaksi;
use App\Models\HistoryTransaksi;

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
                Tables\Columns\TextColumn::make('nomor_transaksi')
                ->searchable()
                ->toggleable()
                ->sortable(),
                Tables\Columns\TextColumn::make('meja.nomor_meja')
                ->icon('heroicon-o-tv')
                ->color('primary')
                ->toggleable()
                ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_reservasi')
                ->toggleable()
                ->sortable(),
                Tables\Columns\TextColumn::make('jam_reservasi')
                ->toggleable()
                ->sortable(),
                Tables\Columns\TextColumn::make('pembayaran.status_pembayaran')
                ->formatStateUsing(fn(Transaksi $record): string => $record->pembayaran->status_pembayaran == 1 ? 'Lunas' : 'Belum Lunas')
                ->color(fn(Transaksi $record): string => $record->pembayaran->status_pembayaran == 1 ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('status_transaksi')
                ->toggleable()
                ->sortable()
                    // ->enum([
                    //     StatusTransaksi::Pending->value => StatusTransaksi::Pending->label(),
                    //     StatusTransaksi::Verified->value => StatusTransaksi::Verified->label(),
                    //     StatusTransaksi::Proses->value => StatusTransaksi::Proses->label(),
                    //     StatusTransaksi::Selesai->value => StatusTransaksi::Selesai->label(),
                    // ])
                    ->badge(),
                Tables\Columns\TextColumn::make('total')
                ->toggleable()
                ->sortable()
                    ->money('IDR', locale: 'id'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                 Action::make('editStatus')
                ->label('Verifikasi')
                ->color('success')
                ->icon('heroicon-o-pencil')
                ->modalHeading('Edit Status Transaksi')
                ->form([
                    Forms\Components\Select::make('status_transaksi')
                        ->options([
                            '0' => 'Pending',
                            '1' => 'Verified',
                            '2' => 'Proses',
                            '3' => 'Selesai',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('catatan')
                    ->label('Catatan'),
                ])
                ->action(function ($record, $data) {
                    $transaksi = Transaksi::find($record->id);
                    $transaksi->update([
                        'status_transaksi' => $data['status_transaksi'],
                    ]);

                    $detail_history = [
                        'transaksi_id' => $transaksi->id,
                        'user_id' => auth()->user()->id,
                        'status' => $data['status_transaksi'],
                        'catatan' => $data['catatan'],
                    ];

                    HistoryTransaksi::create($detail_history);


                }),
                
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
            \App\Filament\Resources\TransaksiResource\RelationManagers\PembayaranRelationManager::class,
            \App\Filament\Resources\TransaksiResource\RelationManagers\HistoryTransaksiRelationManager::class
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