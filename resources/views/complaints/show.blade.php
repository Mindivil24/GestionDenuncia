@extends('layouts.app')

@section('content')
    <h1>Detalles de la Denuncia</h1>

    <p><strong>Código:</strong> {{ $complaint->code }}</p>
    <p><strong>Fecha de Recepción:</strong> {{ $complaint->reception_date }}</p>
    <p><strong>Auditor Responsable:</strong> {{ $complaint->auditor->name }}</p>
    <p><strong>Estado:</strong> {{ $complaint->status }}</p>

    <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection