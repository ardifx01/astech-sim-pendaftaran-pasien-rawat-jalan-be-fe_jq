<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Patient::query())
                ->addIndexColumn()
                ->addColumn('action', function ($patient) {
                    $id = $patient->id;
                    return
                        '<a href="' . route('patients.edit', $id) . '" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                <a onclick="delete_patient(' . $id . ')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('patients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'required|string|max:20',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'required|string|max:20',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return response()->json(['message' => 'Pasien berhasil dihapus.']);
    }

    public function get_patients(Request $request)
    {

    }

    public function select2(Request $request)
    {
        $patients = Patient::all(['id', 'name'])
            ->when($request->q, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })
            ->map(fn($p) => [
                'id' => $p->id,
                'text' => $p->name,
            ]);
        return response()->json($patients);
    }

}
