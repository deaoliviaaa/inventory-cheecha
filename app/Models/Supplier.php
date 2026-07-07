<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'kode_supplier', 'nama_supplier', 'alamat_supplier',
        'nama_barang', 'harga_satuan', 'updated_by'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}