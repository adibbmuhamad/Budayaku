<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudayaResource\Pages;
use App\Models\Budaya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BudayaResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static ?string $model = Budaya::class;

    protected static ?string $navigationLabel = 'Budaya';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->nullable()
                    ->maxLength(500),
                Forms\Components\TextInput::make('origin')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('origin')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([ 
                // Tambahkan filter jika diperlukan
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
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBudayas::route('/'),
            'create' => Pages\CreateBudaya::route('/create'),
            'edit' => Pages\EditBudaya::route('/{record}/edit'),
        ];
    }
}
