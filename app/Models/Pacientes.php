<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

        protected $table='paciente';


       protected $fillable = [

           'id',

           'tipo_documento_id',

           'numero_documento',

           'nombre1',

           'nombre2',

           'apellido1',

           'apellido2',

           'genero_id',

           'departamento_id',

           'municipio_id',

           'deleted'
       ];

       public function tipo_documento()
      {
        return $this->hasOne('App\Models\TipoDocumento','id','tipo_documento_id');
      }
      public function departamento()
     {
       return $this->hasOne('App\Models\Departamento','id','departamento_id');
     }
     public function municipio()
     {
       return $this->hasOne('App\Models\Municipio','id','municipio_id');
     }
     public function genero()
     {
       return $this->hasOne('App\Models\Genero','id','genero_id');
     }

}
