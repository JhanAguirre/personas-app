<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'tb_municipio'; // Si el nombre de la tabla no es 'municipios'
    protected $primaryKey = 'muni_codi'; // Si la clave primaria no es 'id'
    public $timestamps = false; // Si no tienes created_at y updated_at

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'dep_codi', 'dep_codi');
    }
}