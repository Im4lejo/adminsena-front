@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Areas</h1>

        @if ($areasLoadError)
            <div class="alert alert-warning" role="alert">
                No se pudieron cargar las áreas porque la API devolvió una respuesta no válida. Revisa el registro de Laravel.
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($areas as $area)
                    <tr>
                        <td>{{ $area['id'] }}</td>
                        <td>{{ $area['name'] }}</td>
                        {{-- <td>{{ $category['slug'] }}</td> --}}
                        <td>
                            <a href="#" class="btn btn-info btn-sm">Ver más</a>
                        </td>
                    </tr>
                @empty
                    @unless ($areasLoadError)
                        <tr>
                            <td colspan="3">No hay áreas para mostrar.</td>
                        </tr>
                    @endunless
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
