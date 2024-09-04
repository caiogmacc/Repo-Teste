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
            'palavras-do-termo' => 'required|string',
        ]);

        $termo = termo::create($validatedData);

        return response()->json($termo, 201);
        }
    public function destroy(string $id)
        {
        $termo = termo::find($id);

        if (!$termo) {
            return response()->json([
                'message' => 'Nenhum Termo Com este ID.'
            ], 404);
        }
        }


    public function supabase($letra) {
        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImpnbGNvc3pwZmp6c3NvZXFlZGliIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjUzODcwNTMsImV4cCI6MjA0MDk2MzA1M30.WKerLtC52hbf2hGUoQhC76n7ZSHlh75zJX4rCoetKZk',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImpnbGNvc3pwZmp6c3NvZXFlZGliIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjUzODcwNTMsImV4cCI6MjA0MDk2MzA1M30.WKerLtC52hbf2hGUoQhC76n7ZSHlh75zJX4rCoetKZk'
        ])->get('https://jglcoszpfjzssoeqedib.supabase.co/rest/v1/palavras', [
            'letra' => 'eq.'.$letra,
            'select' => '*'
        ]);

        if ($response->successful()) {
            $data = $response->json();
            // Manipule os dados conforme necessário
            return $data;
        } else {
            // Trate o erro
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }
        }
    public function delpalavra($palavra){
        
    $initialLetter = strtolower($palavra[0]);

    $response = Http::withHeaders([
        'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImpnbGNvc3pwZmp6c3NvZXFlZGliIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjUzODcwNTMsImV4cCI6MjA0MDk2MzA1M30.WKerLtC52hbf2hGUoQhC76n7ZSHlh75zJX4rCoetKZk',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImpnbGNvc3pwZmp6c3NvZXFlZGliIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjUzODcwNTMsImV4cCI6MjA0MDk2MzA1M30.WKerLtC52hbf2hGUoQhC76n7ZSHlh75zJX4rCoetKZk'
    ])->get('https://jglcoszpfjzssoeqedib.supabase.co/rest/v1/palavras', [
        'letra' => 'eq.' . $initialLetter,
        'select' => '*'
    ]);

    if ($response->successful()) {
        $data = $response->json();

        foreach ($data as $item) {
            echo "Palavra retornada: " . $item['palavra'] . "\n";
        }

        $cleanedData = array_map(function($item) {
            $item['palavra'] = str_replace("\n", '', $item['palavra']);
            return $item;
        }, $data);

        $filteredWords = array_filter($cleanedData, function($word) use ($palavra) {
            return trim(strtolower($word['palavra'])) !== trim(strtolower($palavra));
        });

        foreach ($filteredWords as $item) {
            echo "Palavra após filtragem: " . $item['palavra'] . "\n";
        }

        return $filteredWords;
    } else {
        return response()->json(['error' => 'Failed to fetch data'], 500);
    }
    }}

    
    