<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormResource\Pages;
use App\Filament\Resources\FormResource\RelationManagers;
use App\Models\Form as FormModel;
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

class FormResource extends Resource
{
    protected static ?string $model = FormModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Formulir';

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
                            ->image(),

                        Forms\Components\TextInput::make('stok')
                            ->numeric()
                            ->label('Stok'),                
                        
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

                        TextinputColumn::make('stok')
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
                        formModel::query()
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
            'index' => Pages\ListForms::route('/'),
            'create' => Pages\CreateForm::route('/create'),
            'edit' => Pages\EditForm::route('/{record}/edit'),
        ];
    }

    public static function getPluralLabel(): string
            {
                return 'Formulir';
            }

}
