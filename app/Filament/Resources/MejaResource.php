<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MejaResource\Pages;
use App\Models\Meja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MejaResource extends Resource
{
    protected static ?string $model = Meja::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    protected static ?string $navigationGroup = 'Manajemen Toko';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_meja')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kapasitas')
                    ->required()
                    ->numeric()
                    ->suffix('Orang'),
                Forms\Components\Toggle::make('status_meja'),
                Forms\Components\FileUpload::make('foto_meja')
                    ->label('Foto Meja (optional)')
                    ->directory('foto_meja')
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'image/webp'])
                    ->imagePreviewHeight('5')
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('4:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_meja')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('kapasitas')
                    ->formatStateUsing(fn(Meja $record): string => $record->kapasitas . ' Orang')
                    ->toggleable(),
                Tables\Columns\ToggleColumn::make('status_meja')
                    ->toggleable(),
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
            'index' => Pages\ListMejas::route('/'),
            'create' => Pages\CreateMeja::route('/create'),
            'edit' => Pages\EditMeja::route('/{record}/edit'),
        ];
    }
}
