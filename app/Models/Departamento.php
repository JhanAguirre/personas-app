<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Departamento extends Model
    {
        use HasFactory;

        protected $table = 'tb_departamento';
        protected $primaryKey = 'dep_codi';
        protected $fillable = ['dep_nomb', 'pais_codi'];
        public function pais()
        {
            return $this->belongsTo(Pais::class, 'pais_codi', 'pais_codi');
        }
        public function municipios()
        {
            return $this->hasMany(Municipio::class, 'dep_codi', 'dep_codi');
        }
    }
