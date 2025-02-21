<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    use HasFactory;
    protected $fillable = ['veiculo_id', 'motorista_id', 'km_inicial', 'km_final'];
    protected $table = 'viagens';

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function motoristas()
    {
        return $this->belongsToMany(Motorista::class, 'motorista_viagem', 'viagens_id', 'motorista_id');
    }


}
