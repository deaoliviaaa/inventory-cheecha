<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'kode_pembelian', 'tanggal_pembelian', 'supplier_id',
        'nama_barang', 'jumlah_stok', 'harga_total', 'updated_by'
    ];

    protected $casts = [
        'tanggal_pembelian' => 'date',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}