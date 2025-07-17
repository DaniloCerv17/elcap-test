<x-app-layout>
    <h1>Administrar Bebidas</h1>

    <div class="contenedor botones-index">
       
            <a class="btn-comida" href="{{route('back.index')}}"> Regresar</a>
             <a class="btn-comida" href="{{route('bebidas.create')}}"> Nuevo Producto</a>
            

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
                @foreach ($bebidas as $bebida)
                <tr>
                    <td>{{$bebida->id}}</td>
                    <td>{{$bebida->nombre}}</td>
                    <td>${{$bebida->precio}}</td>
                    <td>{{$bebida->descripcion}}</td>
                      <td>
                        @if ($bebida->imagen)

                        <img src="{{ asset('storage/'.$bebida->imagen) }}" alt="" style="width: 100px; height: auto;">
                        @endif
                      </td>

                    <td>{{$bebida->subcategoria->nombre}}</td>
                    <td>
                        <a class="icono-conf" href="{{ route('bebidas.edit', $bebida->slug) }}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('bebidas.destroy', $bebida->slug) }}" method="POST" id="form-eliminar-{{ $bebida->id }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <a class="icono-conf eliminar-producto" onclick="event.preventDefault(); document.getElementById('form-eliminar-{{ $bebida->id }}').submit();">
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