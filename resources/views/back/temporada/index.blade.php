<x-app-layout>
    <h1>Administrar Comidas de Temporada</h1>


    <div class="contenedor botones-index">
       
            <a class="btn-comida" href="{{route('back.index')}}"> Regresar</a>
             <a class="btn-comida" href="{{route('temporada.create')}}"> Nuevo Producto</a>
            

    </div>
    <div class=" table-reservas">
        <table class="contenedor">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                      <th>IMG</th>
                    <th>Sub-Categoria</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($temporadas as $temporada)
                <tr>
                    <td>{{$temporada->id}}</td>
                    <td>{{$temporada->nombre}}</td>
                    <td>${{$temporada->precio}}</td>
                    <td>{{$temporada->descripcion}}</td>
                      <td>
                        @if ($temporada->imagen)

                        <img src="{{ asset('storage/'.$temporada->imagen) }}" alt="" style="width: 100px; height: auto;">
                        @endif
                      </td>

                    <td>{{$temporada->subcategoria->nombre}}</td>
                    <td>
                        <a class="icono-conf" href="{{ route('temporada.edit', $temporada->slug) }}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('temporada.destroy', $temporada->slug) }}" method="POST" id="form-eliminar-{{ $temporada->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a class="icono-conf eliminar-producto" onclick="event.preventDefault(); document.getElementById('form-eliminar-{{ $temporada->id }}').submit();">
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

