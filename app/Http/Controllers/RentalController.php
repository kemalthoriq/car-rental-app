<?php
namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car; // Mengimpor model Car
use Illuminate\Http\Request;

class RentalController extends Controller
{
    // Menyewa mobil
    public function store(Request $request)
    {
        // Validasi input peminjaman
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Menghitung total harga sewa
        $car = Car::find($request->car_id); // Mengambil model Car
        $totalPrice = $car->rental_price_per_day * (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);

        // Buat peminjaman baru
        $rental = Rental::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);

        // Mengupdate status mobil
        $car->is_available = false;
        $car->save();

        // Mengembalikan respons
        return response()->json($rental, 201);
    }

    // Mengembalikan mobil
    public function returnCar(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        // Update status mobil
        $car = Car::find($rental->car_id);
        $car->is_available = true;
        $car->save();

        // Hapus peminjaman dari database
        $rental->delete();

        return response()->json(null, 204);
    }
}
