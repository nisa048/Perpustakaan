<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = ['judul',	'penulis',	'penerbit',	'tahun_terbit',	'isbn',	'stok'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    //	Logika	bisnis	disimpan	di	Model,	bukan	di	Controller	(prinsip	Clean	Code)
    public function pinjamkan(): void
    {
        $this->decrement('stok');
    }

    public function kembalikan(): void
    {
        $this->increment('stok');
    }
}
