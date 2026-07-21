<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    
    protected $fillable = ['id', 'data_compra'];
    
    public function jogos()
    {
        return $this->belongsToMany(Jogo::class, 'jogos_comprados', 'id_compra', 'id_jogo')->withTimestamps()->withPivot('hash');
    }
    
}
