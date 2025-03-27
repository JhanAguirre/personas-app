<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'tb_departamento';
    protected $primaryKey = 'depa_codi';
    protected $fillable = ['depa_nomb', 'pais_nomb'];
    public $timestamps = false;

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_codi', 'pais_codi'); // Descomentado y definido
    }
}