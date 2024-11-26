<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
     // Listar todas las acciones del registro de auditoría
     public function index(Request $request) {
        $logs = AuditLog::with('user', 'complaint');

        // Filtro opcional por usuario
        if ($request->has('user_id') && $request->user_id != null) {
            $logs->where('user_id', $request->user_id);
        }

        // Filtro opcional por denuncia
        if ($request->has('complaint_id') && $request->complaint_id != null) {
            $logs->where('complaint_id', $request->complaint_id);
        }

        $logs = $logs->orderBy('timestamp', 'desc')->paginate(10);

        $users = User::all(); // Para filtrar por usuarios
        $complaints = Complaint::all(); // Para filtrar por denuncias

        return view('auditlogs.index', compact('logs', 'users', 'complaints'));
    }

    // Detalle de una acción específica
    public function show(AuditLog $auditLog) {
        return view('auditlogs.show', compact('auditLog'));
    }
}
