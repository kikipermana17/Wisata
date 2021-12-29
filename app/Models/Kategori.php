<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $visible = ['nama'];

    protected $fillable = ['nama'];

    public $timestamps = true;

    public function Wisatas()
    {
        return $this->hasMany('App\Models\Wisata', 'kategori_id');
    }
}
