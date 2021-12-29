<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $visible = ['kategori_id', 'nama_wisata', 'alamat', 'deskripsi', 'fasilitas', 'biro_id', 'cover'];

    protected $fillable = ['kategori_id', 'nama_wisata', 'alamat', 'deskripsi', 'fasilitas', 'biro_id', 'cover'];

    public $timestamps = true;

    public function Kategoris()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }

    public function Biros()
    {
        return $this->belongsTo('App\Models\Biro', 'biro_id');
    }
}
