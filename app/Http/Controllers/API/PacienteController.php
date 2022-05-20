<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\Departamento;
use App\Models\Genero;
use App\Models\Municipio;
use App\Models\TipoDocumento;



class PacienteController extends Controller
{
    public function getAll(){
        $data = Pacientes::with('tipo_documento','departamento','municipio','genero')->where('deleted',0)->get();
        return response()->json($data, 200);
      }

    public function getAllTipoGener()
    {
        $data = Genero::get();
        return response()->json($data, 200);
    }

    public function getAllTipoId()
    {
        $data = TipoDocumento::get();
        return response()->json($data, 200);
    }

    public function getAllDepartament()
    {
        $data = Departamento::get();
        return response()->json($data, 200);
    }

    public function getAllCity()
    {
        $data = Municipio::get();
        return response()->json($data, 200);
    }

      public function create(Request $request){
        $data['numero_documento'] = $request['identificacion'];
        $data['tipo_documento_id'] = $request['tipo_id'];
        $data['nombre1'] = $request['nombre1'];
        $data['nombre2'] = $request['nombre2'];
        $data['apellido1'] = $request['apellido1'];
        $data['apellido2'] = $request['apellido2'];
        $data['genero_id'] = $request['genero'];
        $data['departamento_id'] = $request['departamento'];
        $data['municipio_id'] = $request['municipio'];


        Pacientes::create($data);
          return response()->json([
              'message' => "Creado correctamente",
              'success' => true
          ], 200);


      }

      public function delete($id){
        $res = Pacientes::find($id)->update([
          'deleted'=>1
        ]);
        return response()->json([
            'message' => "Eliminado Correctamente",
            'success' => true
        ], 200);
      }

      public function get($id){
        $data = Pacientes::with('tipo_documento','departamento','municipio','genero')->find($id);
        return response()->json($data, 200);
      }

      public function update(Request $request,$id){
        $data['numero_documento'] = $request['identificacion'];
        $data['tipo_documento_id'] = $request['tipo_id'];
        $data['nombre1'] = $request['nombre1'];
        $data['nombre2'] = $request['nombre2'];
        $data['apellido1'] = $request['apellido1'];
        $data['apellido2'] = $request['apellido2'];
        $data['genero_id'] = $request['genero'];
        $data['departamento_id'] = $request['departamento'];
        $data['municipio_id'] = $request['municipio'];
        Pacientes::find($id)->update($data);
          return response()->json([
            'message' => "Actualizado correctamente",
            'success' => true
          ], 200);

      }
}
