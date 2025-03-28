<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commment = Comment::orderBy('created_at', 'desc')->get();
        //filtrer

        return CommentResource::collection($comment);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'content' => 'required|string',
            'article_id' => 'required|exists:articles,id',
            'auteur' => 'required|string',
        ]);

        // Création du commentaire
        $comment = Comment::create($validated);

        return response()->json([
            'message' => 'Commentaire ajouté avec succès !',
            'comment' => $comment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
