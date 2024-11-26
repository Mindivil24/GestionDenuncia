@extends('layouts.app')

@section('content')
    <h1>Listado de Denuncias</h1>
    <a href="{{ route('complaints.create') }}" class="btn btn-primary">Crear Denuncia</a>

    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Fecha de Recepción</th>
                <th>Auditor</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->code }}</td>
                    <td>{{ $complaint->reception_date }}</td>
                    <td>{{ $complaint->auditor->name }}</td>
                    <td>{{ $complaint->status }}</td>
                    <td>
                        <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('complaints.edit', $complaint->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $complaints->links() }}
@endsection
