<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;
    protected $table = 'carrinho';
    protected $fillable = [
        'id',
        'id_jogo',
        'quantidade',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    
    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'id_jogo');
    }
    
}
