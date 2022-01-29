<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Login;
Use App\Models\Paket;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
