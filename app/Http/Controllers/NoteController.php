<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Obtener todas las notas
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->get();
        return response()->json($notes);
    }

    // Crear una nueva nota
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // Guardar el ID del usuario autenticado
        ]);

        return response()->json($note, 201);
    }

    // Obtener una nota específica
    public function show($id)
    {
        $note = Note::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return response()->json($note);
    }

    // Actualizar una nota existente
    public function update(Request $request, $id)
    {
        $note = Note::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $note->update($request->only('title', 'content'));

        return response()->json($note);
    }

    // Eliminar una nota
    public function destroy($id)
    {
        $note = Note::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $note->delete();

        return response()->json(null, 204);
    }
}
