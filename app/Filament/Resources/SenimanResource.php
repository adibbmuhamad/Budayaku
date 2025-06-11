<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SenimanResource\Pages;
use App\Filament\Resources\SenimanResource\RelationManagers;
use App\Models\Seniman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class SenimanResource extends Resource
{
    protected static ?string $model = Seniman::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Nama Seniman')->required(),
            Forms\Components\Textarea::make('biography')->label('Biografi')->required(),
            Forms\Components\TextInput::make('birthplace')->label('Tempat Lahir')->required(),
            Forms\Components\DatePicker::make('birth_date')->label('Tanggal Lahir')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')->label('Nama Seniman')->searchable(),
            Tables\Columns\TextColumn::make('birthplace')->label('Tempat Lahir'),
            Tables\Columns\TextColumn::make('birth_date')->label('Tanggal Lahir')->date('d M Y'),
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
            'index' => Pages\ListSenimen::route('/'),
            'create' => Pages\CreateSeniman::route('/create'),
            'edit' => Pages\EditSeniman::route('/{record}/edit'),
        ];
    }
}
