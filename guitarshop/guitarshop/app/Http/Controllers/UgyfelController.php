<?php

namespace App\Http\Controllers;

use App\Models\Ugyfel;

class UgyfelController extends Controller
{
    public function show(string $nev)
    {
        $ugyfel = Ugyfel::where('nev', $nev)->get();

        if (!$ugyfel) {
            return response()->json([
                'success' => false,
                'message' => 'Az ügyfél nem található.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $ugyfel
        ]);
    }
}
