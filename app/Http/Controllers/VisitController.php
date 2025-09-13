<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Visit;
use Illuminate\Validation\Rule;
use App\Models\Patient;
class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('visits.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visits = Visit::all(['department', 'doctor_name']);
        $departments = ['Poli Umum', 'Poli Gigi', 'Poli Mata', 'Poli Jantung', 'Poli Penyakit Dalam', 'Poli Paru', 'Poli Ginjal'];
        $departments = array_map(function ($item) {
            return [
                'id' => $item,
                'text' => $item
            ];
        }, $departments);
        $doctors = $visits->pluck('doctor_name')->unique()->map(function ($item) {
            return [
                'id' => $item,
                'text' => $item
            ];
        });
        return view('visits.create', compact('departments', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departments = ['Poli Umum', 'Poli Gigi', 'Poli Mata', 'Poli Jantung', 'Poli Penyakit Dalam', 'Poli Paru', 'Poli Ginjal'];

        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date|before_or_equal:today',
            'department' => ['required', 'string', Rule::in($departments)],
            'doctor_name' => 'required|string|max:100|exists:visits,doctor_name',
            'complaint' => 'required|string',
        ], [], [
            'patient_id' => 'Pasien',
            'visit_date' => 'Tanggal Kunjungan',
            'doctor_name' => 'Nama Dokter',
            'department' => 'Poli',
            'complaint' => 'Keluhan',
        ]);

        Visit::create($validated);

        return redirect()->route('visits.index')->with('success', 'Kunjungan berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        $visit = $visit->load('patient');
        return view('visits.show', compact('visit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visits $visits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visits $visits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        //
    }

    public function get_visits(Request $request)
    {
        $patient_id = $request->patient_id;
        return DataTables::of(Visit::query()->when($patient_id, function ($query) use ($patient_id) {
            $query->where('patient_id', $patient_id);
        }))
            ->addIndexColumn()
            ->addColumn('action', function ($visit) {
                return '<a href="' . route('visits.show', $visit->id) . '" class="btn btn-sm btn-secondary"><i class="bi bi-info-circle"></i></a>';
            })
            ->toJson();
    }

    public function get_visits_by_patient(Patient $patient)
    {
        $patient_id = $patient->id;
        return DataTables::of(Visit::query()->when($patient_id, function ($query) use ($patient_id) {
            $query->where('patient_id', $patient_id);
        }))
            ->addIndexColumn()
            ->toJson();
    }
}
