<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrabajosWebController extends Controller
{
    //
    public function inicio(){
        return view('content.administrador.trabajosAdmin',[
            'response'=>self::index(),
            'title'=>'Lista trabajos'
        ]);
    }
    public function index(){
        $url = env('DIR_ROOT')."trab/list";
        $response = Http::get($url);
        return $response->object();
    }
    public function store(Request $request){
        $url = env('DIR_ROOT')."trab/reg";
        $response = Http::post($url,[
            "nombre" => $request->nom
        ]);
        return $response->object();
    }

    public function update(Request $request){
        $url = env('DIR_ROOT')."trab/updt";
        $response = Http::put($url, [
            'nombre_trabajo' => $request->nom,
            'nuevo_nombre'=> $request->nnom,
        ]);
        return $response->object();
    }

    public function delete(Request $request){
        $url = env('DIR_ROOT')."trab/del";
        $response = Http::delete($url, [
            'nombre' => $request->nom
        ]);
        return $response->object();
    }
}
