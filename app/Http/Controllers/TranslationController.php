<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Translation::query();

        if ($request->has('tags')) {
            $tags = explode(',', $request->tags);
            $query->whereJsonContains('tags', $tags);
        }

        if ($request->has('key')) {
            $query->where('key', 'like', '%' . $request->key . '%');
        }

        if ($request->has('content')) {
            $query->where('content', 'like', '%' . $request->content . '%');
        }

        return response()->json($query->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'locale_id' => 'required|exists:locales,id',
            'content' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
        ]);

        $translation = Translation::create($validated);

        return response()->json($translation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $translation = Translation::find($id);

        if (!$translation) {
            return response()->json(['message' => 'Translation not found'], 404);
        }

        return response()->json($translation, 200);
    }

    public function update(Request $request, $id)
    {
        $translation = Translation::find($id);

        if (!$translation) {
            return response()->json(['message' => 'Translation not found'], 404);
        }

        $validated = $request->validate([
            'key' => 'required|string',
            'locale_id' => 'required|exists:locales,id',
            'content' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
        ]);

        $translation->update($validated);

        return response()->json($translation, 200);
    }

    public function destroy($id)
    {
        $translation = Translation::find($id);

        if (!$translation) {
            return response()->json(['message' => 'Translation not found'], 404);
        }

        $translation->delete();

        return response()->json(['message' => 'Translation deleted successfully'], 200);
    }
}
