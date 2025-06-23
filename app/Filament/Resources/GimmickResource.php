<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GimmickResource\Pages;
use App\Filament\Resources\GimmickResource\RelationManagers;
use App\Models\Gimmick;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Filters\SelectFilter;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GimmickResource extends Resource
{
    protected static ?string $model = Gimmick::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

     protected static ?string $navigationLabel = 'Gimmick';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        Forms\Components\DatePicker::make('tanggal')
                            ->required()
                            ->label('Tanggal'),


                        Forms\Components\TextInput::make('nama_barang')
                            ->required()
                            ->label('Nama Barang'),

                        Forms\Components\FileUpload::make('gambar')                            
                              ->label('Gambar')
                              ->image()
                              ->disk('cloudinary')
                              ->visibility('public')
                              ->directory('gambar-barang')
                              ->preserveFilenames(),

                        Forms\Components\TextInput::make('stok')
                            ->numeric()
                            ->label('Stok'),

                        // Forms\Components\Group::make(
                        //     collect(range(1, 30))->map(fn ($i) =>
                        //         Forms\Components\TextInput::make("day_$i")
                        //             ->label("Tgl $i")
                        //             ->numeric()
                        //             ->default(0)
                        //         )->toArray()
                        //     )->columns(5),

                            // Forms\Components\TextInput::make('stok2')
                            // ->numeric()
                            // ->label('Stok Akhir')
                            // ->numeric()
                            // ->label('Stok Akhir')
                            // ->disabled()
                            // ->dehydrated(false) 
                            // ->hint('Akan dihitung otomatis berdasarkan isian pertanggal'),
                        
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
           ->columns([
                        TextColumn::make('nama_barang')
                            ->label('Nama Barang')
                            ->searchable()
                            ->sortable(),
                        
                        ImageColumn::make('gambar')
                            ->label('Gambar')
                            ->disk('public')
                            ->visibility('public')
                            ->size(40),

                        TextInputColumn::make('stok')
                            ->label('Stok')
                            ->columnSpan(2),

                        TextColumn::make('stok2')
                            ->label('Stok Akhir'),

                        
                        TextInputColumn::make('day_1')->label('tanggal 1'),
                        TextInputColumn::make('day_2')->label('tanggal 2'),
                        TextInputColumn::make('day_3')->label('tanggal 3'),                        
                        TextInputColumn::make('day_4')->label('tanggal 4'),                        
                        TextInputColumn::make('day_5')->label('tanggal 5'),                        
                        TextInputColumn::make('day_6')->label('tanggal 6'),                        
                        TextInputColumn::make('day_7')->label('tanggal 7'),                        
                        TextInputColumn::make('day_8')->label('tanggal 8'),                        
                        TextInputColumn::make('day_9')->label('tanggal 9'),                        
                        TextInputColumn::make('day_10')->label('tanggal 10'),                        
                        TextInputColumn::make('day_11')->label('tanggal 11'),                        
                        TextInputColumn::make('day_12')->label('tanggal 12'),                        
                        TextInputColumn::make('day_13')->label('tanggal 13'),                        
                        TextInputColumn::make('day_14')->label('tanggal 14'),                        
                        TextInputColumn::make('day_15')->label('tanggal 15'),                        
                        TextInputColumn::make('day_16')->label('tanggal 16'),                        
                        TextInputColumn::make('day_17')->label('tanggal 17'),                        
                        TextInputColumn::make('day_18')->label('tanggal 18'),                        
                        TextInputColumn::make('day_19')->label('tanggal 19'),                        
                        TextInputColumn::make('day_20')->label('tanggal 20'),                        
                        TextInputColumn::make('day_21')->label('tanggal 21'),                        
                        TextInputColumn::make('day_22')->label('tanggal 22'),                        
                        TextInputColumn::make('day_23')->label('tanggal 23'),                        
                        TextInputColumn::make('day_24')->label('tanggal 24'),                        
                        TextInputColumn::make('day_25')->label('tanggal 25'),                        
                        TextInputColumn::make('day_26')->label('tanggal 26'),                        
                        TextInputColumn::make('day_27')->label('tanggal 27'),                        
                        TextInputColumn::make('day_28')->label('tanggal 28'),                        
                        TextInputColumn::make('day_29')->label('tanggal 29'),                        
                        TextInputColumn::make('day_30')->label('tanggal 30'),                                                                        
                        TextInputColumn::make('day_31')->label('tanggal 31'),                                                                        
                        
                        
                    ])
           ->filters([
            SelectFilter::make('tahun')
                ->label('Filter Tahun')
                ->options(fn () =>
                    Gimmick::query()
                        ->whereNotNull('tanggal')
                        ->selectRaw('YEAR(tanggal) as tahun')
                        ->distinct()
                        ->pluck('tahun', 'tahun')
                        ->filter(fn ($label, $key) => filled($label) && filled($key))
                        
                )
                 ->query(function ($query, array $data) {
                     if (! filled($data['value'] ?? null)) {
                        return $query; // kalau tidak ada nilai filter, tampilkan semua
                            }

                        return $query->whereYear('tanggal', $data['value']);
                })   

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
            'index' => Pages\ListGimmicks::route('/'),
            'create' => Pages\CreateGimmick::route('/create'),
            'edit' => Pages\EditGimmick::route('/{record}/edit'),
        ];
    }

     public static function getPluralLabel(): string
            {
                return 'Gimmick';
            }

}
