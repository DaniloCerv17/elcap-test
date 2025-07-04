<x-app-layout>
    <h1 class="h1-principal">MENÚ</h1>

    <div class="contenedor menu ">


        <div class="categorias">
            <div class="i-1">
                <i class="bi bi-journal-check"></i>
            </div>
            <h2>COMIDAS</h2>
            <div class="i-1">
                <i class="bi bi-chevron-down "></i>
            </div>

        </div>

        <div class="contenedor-2">
            @foreach ($comidas as $comida)
            <div class="sub-menu menu-listado">
                <div class="menu-detalle">
                    <h1>{{$comida->nombre}}</h1>
                    <p>{{$comida->descripcion}}</p>
                </div>
                <div class="menu-precio">
                    <p>$ {{$comida->precio}}</p>
                </div>
                <div class="menu-img">
                    <img  src="{{ asset('storage/'.$comida->imagen) }}" alt="img">
                </div>
            </div>
            @endforeach
        </div>




        <div class="categorias">
            <div class="i-1">
                <i class="bi bi-journal-check"></i>
            </div>
            <h2>BEBIDAS</h2>
            <div class="i-1">
                <i class="bi bi-chevron-down "></i>
            </div>
        </div>

         <div class="contenedor-2">
            @foreach ($bebidas as $bebida)
            <div class="sub-menu menu-listado">
                <div class="menu-detalle">
                    <h1>{{$bebida->nombre}}</h1>
                    <p>{{$bebida->descripcion}}</p>
                </div>
                <div class="menu-precio">
                    <p>$ {{$bebida->precio}}</p>
                </div>
                <div class="menu-img">
                    <img src="{{ asset('storage/'.$bebida->imagen) }}" alt="img">
                </div>
            </div>
            @endforeach
        </div>


        <div class="categorias">
            <div class="i-1">
                <i class="bi bi-journal-check"></i>
            </div>
            <h2>SHOTS</h2>
            <div class="i-1">
                <i class="bi bi-chevron-down "></i>
            </div>

        </div>

        <div class="categorias">
            <div class="i-1">
                <i class="bi bi-journal-check"></i>
            </div>
            <h2>DE TEMPORADA</h2>
            <div class="i-1">
                <i class="bi bi-chevron-down "></i>
            </div>

        </div>
    </div>



</x-app-layout>