<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;


class VisitApiController extends Controller
{
    public function index(Request $request)
    {
        $patient_id = $request->patient_id;
        return DataTables::of(Visit::query()->when($patient_id, function ($query) use ($patient_id) {
            $query->where('patient_id', $patient_id);
        }))
            ->addIndexColumn()
            ->addColumn('patient_name', function ($visit) {
                return $visit->patient->name;
            })
            ->toJson();
    }

    public function show(Visit $visit)
    {
        return new JsonResource($visit->load('patient'));
    }

    public function store(Request $request)
    {
        $departments = ['Poli Umum', 'Poli Gigi', 'Poli Mata', 'Poli Jantung', 'Poli Penyakit Dalam', 'Poli Paru', 'Poli Ginjal'];

        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date|before:tomorrow',
            'department' => ['required', 'string', Rule::in($departments)],
            'doctor_name' => 'required|string|max:100',
            'complaint' => 'required|string|min:5',
        ]);

        $visit = Visit::create($validated);
        return (new JsonResource($visit->load('patient')))
            ->response()
            ->setStatusCode(201);
    }

    public function update(Request $request, Visit $visit)
    {
        $departments = ['Poli Umum', 'Poli Gigi', 'Poli Mata', 'Poli Jantung', 'Poli Penyakit Dalam', 'Poli Paru', 'Poli Ginjal'];

        $validated = $request->validate([
            'patient_id' => 'sometimes|required|exists:patients,id',
            'visit_date' => 'sometimes|required|date|before:tomorrow',
            'department' => ['sometimes', 'required', 'string', Rule::in($departments)],
            'doctor_name' => 'sometimes|required|string|max:100',
            'complaint' => 'sometimes|required|string|min:5',
        ]);

        $visit->update($validated);
        return new JsonResource($visit->load('patient'));
    }

    public function destroy(Visit $visit)
    {
        $visit->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }

    public function byPatient(Patient $patient)
    {
        $visits = Visit::with('patient')->where('patient_id', $patient->id)->latest('visit_date')->paginate(10);
        return JsonResource::collection($visits);
    }
}


