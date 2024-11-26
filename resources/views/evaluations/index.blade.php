<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluaciones') }}
        </h2>
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
                @foreach ($evaluations as $evaluation)
                    <tr>
                        <td>{{ $evaluation->complaint->code }}</td>
                        <td>{{ $evaluation->auditor->name }}</td>
                        <td>{{ $evaluation->result }}</td>
                        <td>{{ $evaluation->evaluation_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>
