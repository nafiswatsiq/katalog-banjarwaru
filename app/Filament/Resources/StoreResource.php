<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoreResource\Pages;
use App\Filament\Resources\StoreResource\RelationManagers;
use App\Models\Store;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Toko';
    protected static ?string $label = 'Toko';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Pemilik Toko')
                    ->required()
                    ->options(fn () => User::role('seller')->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->columnSpanFull()
                    ->prefixIcon('heroicon-o-user')
                    ->disabled(fn () => !Auth::user()->hasRole(['super_admin', 'admin'])),
                Forms\Components\TextInput::make('name')
                    ->label('Nama Toko')
                    ->required()
                    ->maxLength(255)
                    ->prefixIcon('heroicon-o-building-storefront'),
                Forms\Components\TextInput::make('whatsapp')
                    ->label('Nomor WhatsApp')
                    ->required()
                    ->maxLength(255)
                    ->prefix('+62')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->hint('Masukan Nomor tanpa 0 atau +62'),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Toko')
                    ->required()
                    ->rows(3),
                Forms\Components\Textarea::make('address')
                    ->label('Alamat Toko')
                    ->required()
                    ->maxLength(255)
                    ->rows(3),
                Forms\Components\TextInput::make('location')
                    ->label('Lokasi Map Toko')
                    ->hint('Masukkan link lokasi map toko')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-o-map-pin'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('logo')
                    ->collection('store_images')
                    ->label('Logo Toko')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $user = Auth::user();
                if ($user->hasRole(['super_admin', 'admin'])) {
                    $query;
                } else {
                    $query->where('id', $user->store->id);
                }
            })
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('logo')
                    ->collection('store_images')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pemilik Toko')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Toko')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListStores::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'edit' => Pages\EditStore::route('/{record}/edit'),
        ];
    }
}
