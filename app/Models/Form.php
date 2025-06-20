<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['nama_barang', 'gambar', 'stok', 'keterangan', 'tanggal'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge([
            'tanggal',
            'nama_barang',
            'gambar',
            'stok',
            'keterangan',
        ], array_map(fn ($i) => 'day_' . $i, range(1, 30)));
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            $totalKeluar = 0;

            foreach (range(1, 30) as $i) {
                $totalKeluar += (int) ($model->{'day_' . $i} ?? 0);
            }

            // Hitung stok akhir
            $model->stok2 = max(0, (int) $model->stok - $totalKeluar);
        });
    }
}
