<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Yajra\DataTables\DataTables;

class PatientApiController extends Controller
{
    public function index(Request $request)
    {
        return DataTables::of(Patient::query())
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

    }

    public function show(Patient $patient)
    {
        return new JsonResource($patient);
    }

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

        $patient = Patient::create($validated);
        return (new JsonResource($patient))
            ->response()
            ->setStatusCode(201);
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'nik' => 'sometimes|required|string|max:20',
            'gender' => 'sometimes|required|in:L,P',
            'birth_date' => 'sometimes|required|date',
            'phone' => 'sometimes|required|string|max:15',
            'address' => 'sometimes|required|string',
        ]);

        $patient->update($validated);
        return new JsonResource($patient);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }
}


