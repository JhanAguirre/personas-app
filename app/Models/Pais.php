<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'tb_pais';
    protected $primaryKey = 'pais_codi'; // Asegúrate de que esta sea tu clave primaria
    protected $keyType = 'string'; // Si la clave primaria es una cadena (CHAR)
    protected $fillable = ['pais_nomb'];

    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'pais_codi', 'pais_codi');
    }
}