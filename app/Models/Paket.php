<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Pemesanan;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
