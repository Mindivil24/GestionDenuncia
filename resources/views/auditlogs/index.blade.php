<h1>Registro de Auditoría</h1>

<form method="GET" action="{{ route('auditlogs.index') }}">
    <select name="user_id">
        <option value="">-- Filtrar por usuario --</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <select name="complaint_id">
        <option value="">-- Filtrar por denuncia --</option>
        @foreach($complaints as $complaint)
            <option value="{{ $complaint->id }}">{{ $complaint->code }}</option>
        @endforeach
    </select>

    <button type="submit">Filtrar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Acción</th>
            <th>Usuario</th>
            <th>Denuncia</th>
            <th>Detalles</th>
            <th>Fecha y Hora</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->action }}</td>
            <td>{{ $log->user->name }}</td>
            <td>{{ $log->complaint->code ?? 'N/A' }}</td>
            <td>{{ $log->details }}</td>
            <td>{{ $log->timestamp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $logs->links() }}