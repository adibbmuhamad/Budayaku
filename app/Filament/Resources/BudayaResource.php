<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudayaResource\Pages;
use App\Models\Budaya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class BudayaResource extends Resource
{
    protected static ?string $model = Budaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

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
                // Menambahkan fitur upload gambar
                Forms\Components\FileUpload::make('image')
                    ->image() // Hanya menerima file gambar
                    ->disk('public') // Menyimpan gambar di disk 'public'
                    ->directory('budaya-images') // Menyimpan gambar di folder 'budaya-images' di dalam storage/app/public
                    ->nullable(), // Gambar bisa kosong
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
                // Menambahkan kolom gambar di tabel
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public') // Mengambil gambar dari disk 'public'
                    ->url(fn ($record) => Storage::url($record->image)) // Mengambil URL gambar yang telah diupload
                    ->height(50) // Mengatur ukuran gambar yang ditampilkan di tabel
                    ->width(50),
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
