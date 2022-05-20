<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Log;
use App\Models\User;


class HomeController extends Controller
{
  public function obtain_crfs_token(Request $request)
  {
      $response['token'] = csrf_token();
      return $response;
  }

  public function obtainSessionStatus(Request $request)
  {
      $response['success'] = false;
      Log::info("aasasassas");
      Log::info(Auth::user());
      if(Auth::user()){
        $response['success'] = true;
      }

      return $response;
  }

  public function login(Request $request)
  {
      Log::info($request);

    $usuario = $request['usuario'];
    $password = $request['password'];
    Log::info(Auth::attempt(['usuario' => $usuario, 'password' => $password]));

    $user = User::where('usuario',$usuario)->first();
    Log::info($user);
    if(Auth::attempt(['usuario' => $usuario, 'password' => $password])){
        $user = User::where('usuario',$usuario)->first();

        Auth::login($user);
        $response['success'] = true;

    }
    else{
        $response['success'] = false;
    }


    return $response;

  }
}
