@extends('layouts.app')

@section('content')
    <h1>Editar Denuncia</h1>

    <form method="POST" action="{{ route('complaints.update', $complaint->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Código</label>
            <input type="text" name="code" class="form-control" value="{{ $complaint->code }}" required>
        </div>
        <div class="form-group">
            <label for="reception_date">Fecha de Recepción</label>
            <input type="date" name="reception_date" class="form-control" value="{{ $complaint->reception_date }}" required>
        </div>
        <div class="form-group">
            <label for="auditor_id">Auditor Responsable</label>
            <select name="auditor_id" class="form-control">
                @foreach($auditors as $auditor)
                    <option value="{{ $auditor->id }}" {{ $complaint->auditor_id == $auditor->id ? 'selected' : '' }}>
                        {{ $auditor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" class="form-control">
                <option value="En Proceso" {{ $complaint->status == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="Admitido" {{ $complaint->status == 'Admitido' ? 'selected' : '' }}>Admitido</option>
                <option value="No Admitido" {{ $complaint->status == 'No Admitido' ? 'selected' : '' }}>No Admitido</option>
                <option value="Derivado" {{ $complaint->status == 'Derivado' ? 'selected' : '' }}>Derivado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection