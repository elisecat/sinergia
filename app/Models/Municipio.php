<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

        protected $table='municipios';


       protected $fillable = [

           'id',

           'nombre',

           'departamento_id',


       ];

       public function departamento()
      {
        return $this->hasOne('App\Models\Departamento','id','departamento_id ');
      }


}
