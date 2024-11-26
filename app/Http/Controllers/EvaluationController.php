<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Complaint;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    // Listar todas las evaluaciones
    public function index() {
        $evaluations = Evaluation::with('complaint', 'auditor')->get();
        return view('evaluations.index', compact('evaluations'));
    }

    // Mostrar formulario para evaluar una denuncia
    public function create(Complaint $complaint) {
        $auditors = User::where('role', 'auditor')->get();
        return view('evaluations.create', compact('complaint', 'auditors'));
    }

    // Guardar evaluación
    public function store(Request $request, Complaint $complaint) {
        $validated = $request->validate([
            'auditor_id' => 'required|exists:users,id',
            'evaluation_date' => 'required|date',
            'result' => 'required',
            'comments' => 'nullable',
        ]);

        Evaluation::create([
            'complaint_id' => $complaint->id,
            'auditor_id' => $validated['auditor_id'],
            'evaluation_date' => $validated['evaluation_date'],
            'result' => $validated['result'],
            'comments' => $validated['comments'],
        ]);

        return redirect()->route('evaluations.index')->with('success', 'Evaluación guardada con éxito');
    }
}
