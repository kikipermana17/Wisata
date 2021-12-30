<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    use HasFactory;

    protected $visible = ['nama', 'jk', 'telpon'];

    protected $fillable = ['nama', 'jk', 'telpon'];

    public $timestamps = true;

    public function Biro()
    {
        return $this->hasMany('App\Models\Biro', 'biro_id');
    }
}
