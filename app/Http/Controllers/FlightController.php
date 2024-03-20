<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function index()
    {
        $data['flights'] = Flight::all();

        return view('flight.index', $data);
    }

    public function create()
    {
        return view('flight.create');
    }

    public function save(Request $request)
    {
        try {

            $validator = $request->validate([
                'name' => 'required',
                'airline' => 'required',
            ]);

            DB::beginTransaction();

            Flight::create($validator);

            DB::commit();

            return redirect()->route('flight.index')->with('success', 'Flight created');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something wrong');
        }
    }

    public function show($id)
    {
        $data['flight'] = Flight::find($id);
        return view('flight.show', $data);
    }

    public function update($id, Request $request)
    {
        $flight = Flight::find($id);
        $validator = $request->validate([
            'name' => 'required',
            'airline' => 'required',
        ]);

        $result = $flight->update($validator);

        if ($result) {
            return redirect()->route('flight.index')->with('success', 'Flight updated');
        } else {
            return back()->with('error', 'Something wrong');
        }
    }

    public function destroy($id)
    {
        $flight = Flight::find($id);
        $flight->delete();
        return redirect()->route('flight.index')->with('success', 'Flight deleted');
    }
}