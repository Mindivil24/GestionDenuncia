@extends('layouts.app')

@section('content')
    <h1>Listado de Evaluaciones</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Denuncia</th>
                <th>Auditor</th>
                <th>Resultado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->complaint->code }}</td>
                    <td>{{ $evaluation->auditor->name }}</td>
                    <td>{{ $evaluation->result }}</td>
                    <td>{{ $evaluation->evaluation_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection