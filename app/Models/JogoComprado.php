<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JogoComprado extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'id_jogo', 'id_jogo');
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}