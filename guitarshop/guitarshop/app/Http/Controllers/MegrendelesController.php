<?php

namespace App\Http\Controllers;

use App\Models\Megrendeles;

class MegrendelesController extends Controller
{
    public function show($id)
    {
        $megrendeles = Megrendeles::find($id);

        if (!$megrendeles) {
            return response()->json([
                'success' => false,
                'message' => 'A megadott megrendelés nem található.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $megrendeles
        ]);
    }
}
