<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Retorna todos os posts ordenados por data decrescente
        return Post::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $post = Post::create([
            'description' => $request->description,
            // 'data' pode ser omitido se usar timestamps automáticos
        ]);

        return response()->json($post, 201);
    }
}
