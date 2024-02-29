<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'image',
        'stock',
        'anggaran',
        'scan',
        'serialnumber',
        'kepemilikan',
        'lokasi', // Add 'lokasi' to the $fillable array
        'gedung', // Add 'gedung' to the $fillable array
    ];

    public Function peminjam(){
        return $this->hasMany(Peminjam::class);
    }
}
