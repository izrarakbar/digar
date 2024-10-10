<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratPerdirResource\Pages;
use App\Models\SuratPerdir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class SuratPerdirResource extends Resource
{
    protected static ?string $model = SuratPerdir::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Surat Perdir';
    
    protected static ?string $navigationGroup = 'Source';
    
    protected static ?int $navigationSort = 32;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_surat')->required(),
                Forms\Components\TextInput::make('judul')->required(),
                Forms\Components\TextInput::make('pembuat_dokumen')->required(),
                Forms\Components\DatePicker::make('tanggal_surat')->required(),
                Forms\Components\TextInput::make('ringkasan')->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'masih_berlaku' => 'Masih Berlaku',
                        'tidak_berlaku' => 'Tidak Berlaku',
                    ])
                    ->label('Status'),
                Forms\Components\FileUpload::make('file')
                    ->required()
                    ->label('Upload File')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']) // MIME types
                    ->maxSize(2048), // Maksimal 2MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_surat')->label('Nomor Surat')->searchable(),
                Tables\Columns\TextColumn::make('judul')->label('Judul')->searchable(),
                Tables\Columns\TextColumn::make('pembuat_dokumen')->label('Pembuat Dokumen')->searchable(),
                Tables\Columns\TextColumn::make('tanggal_surat')->label('Tanggal Surat'),
                Tables\Columns\TextColumn::make('ringkasan')->label('Ringkasan')->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Status')->searchable(),
                Tables\Columns\TextColumn::make('file')
                    ->label('File')
                    ->formatStateUsing(function ($state) {
                        if ($state) {
                            return '<a href="' . Storage::url($state) . '" target="_blank" class="text-blue-500 underline">Download</a>';
                        }
                        return 'No file';
                    })->html(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuratPerdirs::route('/'),
            'create' => Pages\CreateSuratPerdir::route('/create'),
            'edit' => Pages\EditSuratPerdir::route('/{record}/edit'),
        ];
    }
}
