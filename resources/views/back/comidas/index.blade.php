<x-app-layout>
    <h1>Administrar Comidas</h1>


    <div class="contenedor">
       
            <a class="btn-comida" href="{{route('comidas.create')}}"> Nuevo Producto</a>
            

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
                @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>${{$producto->precio}}</td>
                    <td>{{$producto->descripcion}}</td>
                      <td>
                        @if ($producto->imagen)

                        <img src="{{ asset('storage/'.$producto->imagen) }}" alt="" style="width: 100px; height: auto;">
                        @endif
                      </td>

                    <td>{{$producto->subcategoria->nombre}}</td>
                    <td>
                        <a class="icono-conf" href="{{ route('comidas.edit', $producto->slug) }}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('comidas.destroy', $producto->slug) }}" method="POST" id="form-eliminar-{{ $producto->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a class="icono-conf eliminar-producto" onclick="event.preventDefault(); document.getElementById('form-eliminar-{{ $producto->id }}').submit();">
                            <i class="bi bi-trash"></i>
                        </a>

                        <!-- <a class="icono-conf" href="{{ route('back.cultura') }}"><i class="bi bi-trash"></i></a> -->

                        <!-- <form action="{{ route('comidas.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar Post</button> -->
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>



</x-app-layout>

<!-- <div class="contenedor">
        <div class="form">
            

            <form class="formulario" action="{{ route('comidas.store')}}" method="POST">
                @csrf
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre Producto">
                </div>

                <div class="campo">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" placeholder="Precio">
                </div>


                <div class="campo">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
                </div>


                <div class="campo">
                    <label for="subCategoria">Sub Categoria</label>
                    <input type="number" name="subCategoria" id="subCategoria" placeholder="SubCategoria">
                </div>

                <input type="submit" value="Enviar" class="boton">

            </form>
        </div>
    </div> -->