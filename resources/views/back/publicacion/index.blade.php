<x-app-layout>
    <h1>Publicaciones</h1>


    <div class="contenedor">

        <a class="btn-comida" href="{{route('publicacion.create')}}"> Nueva Publicación</a>


    </div>
    <div class=" table-reservas">
        <table class="contenedor">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Slug</th>
                    <th>Contenido</th>
                    <th>IMG</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $publicacion)
                <tr>
                    <td>{{$publicacion->id}}</td>
                    <td>{{$publicacion->titulo}}</td>
                    <td>{{$publicacion->slug}}</td>
                    <td>{{$publicacion->contenido}}</td>
                    <td>
                        @if ($publicacion->imagen)

                        <img src="{{ asset('storage/'.$publicacion->imagen) }}" alt="" style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>{{$publicacion->fecha}}</td>
                    <td>{{$publicacion->hora}}</td>
                    <td>
                        <a class="icono-conf" href="{{ route('publicacion.edit', $publicacion->slug) }}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('publicacion.destroy', $publicacion->slug) }}" method="POST" id="form-eliminar-{{ $publicacion->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a class="icono-conf eliminar-producto" onclick="event.preventDefault(); document.getElementById('form-eliminar-{{ $publicacion->id }}').submit();">
                            <i class="bi bi-trash"></i>
                        </a>

                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>



</x-app-layout>