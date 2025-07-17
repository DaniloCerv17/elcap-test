<x-app-layout>
    <h1>Administrar Shots</h1>


    <div class="contenedor botones-index">
       
            <a class="btn-comida" href="{{route('back.index')}}"> Regresar</a>
             <a class="btn-comida" href="{{route('shots.create')}}"> Nuevo Producto</a>
            

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
                @foreach ($shots as $shot)
                <tr>
                    <td>{{$shot->id}}</td>
                    <td>{{$shot->nombre}}</td>
                    <td>${{$shot->precio}}</td>
                    <td>{{$shot->descripcion}}</td>
                      <td>
                        @if ($shot->imagen)

                        <img src="{{ asset('storage/'.$shot->imagen) }}" alt="" style="width: 100px; height: auto;">
                        @endif
                      </td>

                    <td>{{$shot->subcategoria->nombre}}</td>
                    <td>
                        <a class="icono-conf" href="{{ route('shots.edit', $shot->slug) }}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('shots.destroy', $shot->slug) }}" method="POST" id="form-eliminar-{{ $shot->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a class="icono-conf eliminar-producto" onclick="event.preventDefault(); document.getElementById('form-eliminar-{{ $shot->id }}').submit();">
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

