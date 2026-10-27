@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Areas</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <div>
                    <br><br>
                </div>
                <div>
                    <a href="{{ route('area.create') }}" class="btn btn-outline-success btn-sm">Nueva Area</a>
                    <br><br>
                </div>
                @foreach ($areas as $area)
                    <tr>
                        <td>{{ $area['id'] }}</td>
                        <td>{{ $area['name'] }}</td>
                        </td>
                        <td>
                            <a href="{{ route('areas.show', $area['id']) }}" class="btn btn-info btn-sm">Ver más</a>

                            <a href="{{ route('area.edit', $area['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('area.destroy', $area['id']) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta area?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
