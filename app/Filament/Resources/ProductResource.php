<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $label = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Produk')
                    ->schema([
                        Forms\Components\Select::make('store_id')
                            ->label('Pilih Toko')
                            ->relationship('store', 'name')
                            ->visible(fn () => Auth::user()->hasRole(['super_admin', 'admin']))
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Produk')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category_id')
                            ->label('Kategori Produk')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi Produk')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('price')
                            ->label('Harga Produk')
                            ->required()
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\ToggleButtons::make('discount')
                            ->label('Produk Diskon?')
                            ->boolean()
                            ->live()
                            ->inline(),
                        Forms\Components\TextInput::make('original_price')
                            ->visible(fn (callable $get) => $get('discount'))
                            ->label('Harga Asli Produk')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->prefix('Rp'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Fitur dan Spesifikasi')
                    ->schema([
                        TableRepeater::make('features')
                            ->label('Fitur Produk')
                            ->default([
                                ['name' => 'Bahan bambu pilihan berkualitas tinggi'],
                                ['name' => 'Finishing natural yang tahan lama'],
                                ['name' => 'Desain minimalis dan elegan'],
                                ['name' => 'Ramah lingkungan dan berkelanjutan'],
                                ['name' => 'Mudah dibersihkan dan dirawat'],
                            ])
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('')
                                    ->required(),
                            ])
                            ->columnSpan(1),
                        Forms\Components\KeyValue::make('specifications')
                            ->label('Spesifikasi Produk')
                            ->keyLabel('Nama')
                            ->valueLabel('Nilai')
                            ->default([
                                'Material' => 'Bambu Natural',
                                'Dimensi' => '40cm x 30cm x 25cm',
                                'Berat' => '1.2kg',
                                'Warna' => 'Natural Bambu'
                            ]),
                    ])
                    ->columns(2),
                Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                    ->label('Gambar Produk')
                    ->collection('images')
                    ->multiple()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Jadikan Produk Unggulan')
                    ->columnSpanFull(),
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
                    $query->where('store_id', $user->store->id);
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('store.name')
                    ->label('Nama Toko')
                    ->visible(fn () => Auth::user()->hasRole(['super_admin', 'admin']))
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->prefix('Rp ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('original_price')
                    ->label('Diskon')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Ya' : 'Tidak')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Produk Unggulan')
                    ->boolean(),
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
            ])
            ->defaultSort('updated_at', 'desc');
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
