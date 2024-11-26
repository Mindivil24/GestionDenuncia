<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    // Listar todas las denuncias
    public function index() {
        $complaints = Complaint::with('user')->paginate(12);
        return view('complaints.index', compact('complaints'));
    }

    // Mostrar formulario para registrar una nueva denuncia
    public function create() {
        $users = User::where('role', 'auditor')->get(); // Obtener usuarios con rol de auditor
        return view('complaints.create', compact('users'));
    }

    // Guardar una nueva denuncia
    public function store(Request $request) {
        $validated = $request->validate([
            'code' => 'required|unique:complaints',
            'description' => 'required',
            'submission_date' => 'required|date',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        Complaint::create($validated);

        return redirect()->route('complaints.index')->with('success', 'Denuncia registrada con éxito');
    }

    // Editar denuncia
    public function edit(Complaint $complaint) {
        $users = User::where('role', 'auditor')->get();
        return view('complaints.edit', compact('complaint', 'users'));
    }

    // Actualizar denuncia
    public function update(Request $request, Complaint $complaint) {
        $validated = $request->validate([
            'description' => 'required',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $complaint->update($validated);

        return redirect()->route('complaints.index')->with('success', 'Denuncia actualizada con éxito');
    }

    // Eliminar denuncia
    public function destroy(Complaint $complaint) {
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'Denuncia eliminada con éxito');
    }
}
