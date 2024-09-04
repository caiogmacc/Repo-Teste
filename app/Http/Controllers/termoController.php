<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\termo;
use Response;

class termoController extends Controller{

    public function index(){
       $termo  =  termo::all();
        return response()->json($termo);
        }
    public function store(Request $request)
        {
        $validatedData = $request->validate([
            'palavras-do-termo' => 'string',
        ]);

        $termo = termo::create($validatedData);

        return response()->json($termo, 201);
        }

    public function search($id)
        {
         $termo = termo::where('id', $id)->first();

   
        if ($termo) {
            return response()->json($termo);
        } else {
            return response()->json(['message' => 'Termo Nao Existe'], 404);
        }
      
        }
       public function procurarTermo($palavrasdotermo)
    {
  
        $palavrasdotermo = termo::where('palavras-do-termo', $palavrasdotermo)->first();

   
        if ($palavrasdotermo) {
            return response()->json($palavrasdotermo);
        } else {
            return response()->json(['message' => 'termo nao existe'], 404);
        }
    }
       public function show($palavrasdotermo)
    {
  
        $palavrasdotermo = termo::where('palavras-do-termo', $palavrasdotermo)->first();

   
        if ($palavrasdotermo) {
            return response()->json($palavrasdotermo);
        } else {
            return response()->json(['message' => 'termo nao existe'], 404);
        }
    }
}