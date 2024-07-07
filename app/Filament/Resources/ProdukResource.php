<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Manajemen Toko';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Produk')
                    ->description('* Wajib diisi')
                    ->schema([
                        Forms\Components\TextInput::make('nama_produk')
                            ->required(),
                        Forms\Components\TextInput::make('harga_produk')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('kategori_produk')
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status_produk')
                            ->required(),
                        Forms\Components\FileUpload::make('foto_produk')
                            ->label('Foto Produk (optional)')
                            ->directory('foto_produk')
                            ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'image/webp'])
                            ->imagePreviewHeight('5')
                            ->loadingIndicatorPosition('left')
                            ->panelAspectRatio('4:1')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadButtonPosition('left')
                            ->uploadProgressIndicatorPosition('left'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_produk')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('nama_produk')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('harga_produk')
                   ->money('IDR', locale: 'id'),
                Tables\Columns\ToggleColumn::make('status_produk'),
                Tables\Columns\TextColumn::make('kategori_produk')
                ->badge()
                

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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}