<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Locale::all(), 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'locale' => 'required|string|unique:locales,locale',
            'name' => 'required|string',
        ]);

        $locale = Locale::create($validated);

        return response()->json($locale, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $locale = Locale::find($id);

        if (!$locale) {
            return response()->json(['message' => 'Locale not found'], 404);
        }

        return response()->json($locale, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $locale = Locale::find($id);

        if (!$locale) {
            return response()->json(['message' => 'Locale not found'], 404);
        }

        $validated = $request->validate([
            'locale' => 'required|string|unique:locales,locale,' . $id,
            'name' => 'required|string',
        ]);

        $locale->update($validated);

        return response()->json($locale, 200);
    }

    public function destroy($id)
    {
        $locale = Locale::find($id);

        if (!$locale) {
            return response()->json(['message' => 'Locale not found'], 404);
        }

        $locale->delete();

        return response()->json(['message' => 'Locale deleted successfully'], 200);
    }
}
