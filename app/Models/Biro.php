<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biro extends Model
{
    use HasFactory;

    protected $visible = ['wisatawan_id', 'nama', 'alamat', 'telpon'];

    protected $fillable = ['wisatawan_id', 'nama', 'alamat', 'telpon'];

    public $timestamps = true;

    public function Wisatawans()
    {
        return $this->belongsTo('App\Models\Wisatawan', 'wisatawan_id');
    }

    public function Wisatas()
    {
        return $this->hasMany('App\Models\Wisata', 'wisata_id');
    }
}
