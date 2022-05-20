<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

        protected $table='genero';


       protected $fillable = [

           'id',

           'nombre',


       ];

       public function curso_data()
      {
        return $this->hasOne('App\Models\Cursos','id','code_curso');
      }
      public function salon_data()
     {
       return $this->hasOne('App\Models\Salones','id','code_salon');
     }

}
