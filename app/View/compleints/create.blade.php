@extends('layouts.app')

@section('content')
    <h1>Crear Denuncia</h1>

    <form method="POST" action="{{ route('complaints.store') }}">
        @csrf
        <div class="form-group">
            <label for="code">Código</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="reception_date">Fecha de Recepción</label>
            <input type="date" name="reception_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="auditor_id">Auditor Responsable</label>
            <select name="auditor_id" class="form-control">
                @foreach($auditors as $auditor)
                    <option value="{{ $auditor->id }}">{{ $auditor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" class="form-control">
                <option value="En Proceso">En Proceso</option>
                <option value="Admitido">Admitido</option>
                <option value="No Admitido">No Admitido</option>
                <option value="Derivado">Derivado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection