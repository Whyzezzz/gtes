<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jogo';
    protected $fillable = [
        'nome',
        'preco',
        'atributos',
        'path_to_download',
        'background_image', 
    ];
    public function compras()
    {
        return $this->belongsToMany(Compra::class, 'jogos_comprados', 'id_jogo', 'id_compra')->withTimestamps()->withPivot('hash');
    }
    
}
