<h1>Detalle del Registro de Auditoría</h1>

<p><strong>Acción:</strong> {{ $auditLog->action }}</p>
<p><strong>Usuario:</strong> {{ $auditLog->user->name }}</p>
<p><strong>Denuncia:</strong> {{ $auditLog->complaint->code ?? 'N/A' }}</p>
<p><strong>Detalles:</strong> {{ $auditLog->details }}</p>
<p><strong>Fecha y Hora:</strong> {{ $auditLog->timestamp }}</p>

<a href="{{ route('auditlogs.index') }}">Volver al listado</a>