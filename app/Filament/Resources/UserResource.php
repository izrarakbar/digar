<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Users';
    
    protected static ?string $navigationGroup = 'User';
    
    protected static ?int $navigationSort = 38;

    // public static function shouldRegisterNavigation(): bool
    // {
    //     if (auth()->user()->can('Source'))
    //         return true;
    //     else
    //         return false;
    // }

    public static function form(Form $form): Form
{
    return $form->schema([
        Card::make()->schema([

            TextInput::make('name')
                ->required()
                ->maxLength(100),
        
            TextInput::make('email')
                ->email()
                ->label('Email Address')
                ->required()
                ->maxLength(100),
        
            TextInput::make('password')
                ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                ->password()
                ->minLength(8)
                ->same('passwordConfirmation')
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
        
            TextInput::make('passwordConfirmation')
                ->password()
                ->label('Password Confirmation')
                ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                ->minLength(8)
                ->dehydrated(false),

        ]),
    ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('roles.name'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
