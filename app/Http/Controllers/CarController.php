<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Menampilkan semua mobil
    public function index()
    {
        return Car::all(); // Mengembalikan semua data mobil
    }

    // Menambahkan mobil baru
    public function store(Request $request)
    {
        // Validasi input mobil
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|unique:cars',
            'rental_price_per_day' => 'required|numeric',
        ]);

        // Buat mobil baru
        $car = Car::create($request->all());

        // Mengembalikan respons
        return response()->json($car, 201);
    }

    // Update informasi mobil
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());

        return response()->json($car, 200);
    }

    // Menghapus mobil
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return response()->json(null, 204);
    }
}
