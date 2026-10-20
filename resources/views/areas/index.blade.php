@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Categorías</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>

                </tr>
            </thead>
            <tbody>

                <div>
                    <br><br>
                </div>

                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area['id'] }}</td>
                        <td>{{ $area['name'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
