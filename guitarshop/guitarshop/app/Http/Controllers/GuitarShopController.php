<?php

namespace App\Http\Controllers;

use App\Models\GuitarShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuitarShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guitarshop = GuitarShop::all();
        return response()->json($guitarshop);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nev' => 'required|string|max:100',
                'leiras' => 'required|string|max:100',
                'ar' => 'required|numeric|min:0',
            ],
            [
                'nev.required' => 'A szolgáltatás nevének megadása kötelező',
                'leiras.required' => 'A leírás megadása kötelező',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Adatok nem mefelelőek.',
                'errors' => $validator->errors()->toArray()
            ], 422);
        }

        $newRecord = new GuitarShop();

        $newRecord->nev = $request->nev;
        $newRecord->leiras = $request->leiras;
        $newRecord->ar = $request->ar;

        $newRecord->save();
        return response()->json(data: ['success' => true, 'message' => 'Sikeres mentés'], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nev)
    {
        $szolg = GuitarShop::where('nev', $nev)->get();

        if (!$szolg) {
            return response()->json([
                'success' => false,
                'message' => 'A szolgáltatás nem található.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $szolg
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuitarShop $guitarShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuitarShop $guitarShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuitarShop $guitarShop)
    {
        //
    }
}
