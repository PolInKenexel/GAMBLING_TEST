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
                'message' => 'No suspicious ones today',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($info, 200);
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'img' => 'required',
            'lore_desc' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error, incomplete suspicious information',
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
                'message' => 'Error, unable to create suspicious register',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'INFO' => $lore,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
