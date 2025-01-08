<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lore;
use Illuminate\Support\Facades\Validator;

class LoreController extends Controller
{
    public function index(){
        $info = Lore::orderBy('id')->get();

        if($info->isEmpty()){
            $data = [
                'message' => 'No hay sospechosos en este caso',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($info, 200);
    }

    public function store(){
        //FALTA VERIFICAR QUE ESTA FUNCIÓN SIRVA, LO PRUEBAS DESPUÉS
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'img' => 'required',
            'lore_desc' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error con los datos del sospechoso',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $lore = new Lore();

        $lore->name = request('name');
        $lore->age = request('age');
        $lore->img = request('img');
        $lore->lore_desc = request('lore_desc');

        $lore->save();

        if(!$lore){
            $data = [
                'message' => 'Error al añadir al sospechoso',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        return response()->json($data, 201);
    }
}
