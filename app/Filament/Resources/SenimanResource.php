<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SenimanResource\Pages;
use App\Models\Seniman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class SenimanResource extends Resource
{
    protected static ?string $navigationLabel = 'Seniman';
    
    protected static ?string $model = Seniman::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Nama Seniman')->required(),
            Forms\Components\Textarea::make('biography')->label('Biografi')->required(),
            Forms\Components\TextInput::make('birthplace')->label('Tempat Lahir')->required(),
            Forms\Components\DatePicker::make('birth_date')->label('Tanggal Lahir')->required(),
            // Menambahkan fitur upload gambar
            Forms\Components\FileUpload::make('image')
                ->image() // Hanya menerima file gambar
                ->disk('public') // Menyimpan gambar di disk 'public'
                ->directory('seniman-images') // Menyimpan gambar di folder 'seniman-images' di dalam storage/app/public
                ->nullable(), // Gambar bisa kosong
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Seniman')->searchable(),
                Tables\Columns\TextColumn::make('birthplace')->label('Tempat Lahir'),
                Tables\Columns\TextColumn::make('birth_date')->label('Tanggal Lahir')->date('d M Y'),
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
            'index' => Pages\ListSenimans::route('/'),
            'create' => Pages\CreateSeniman::route('/create'),
            'edit' => Pages\EditSeniman::route('/{record}/edit'),
        ];
    }
}
