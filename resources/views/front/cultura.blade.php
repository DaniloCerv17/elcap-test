<x-app-layout>
    <h1 class="h1-principal">CULTURA</h1>

    <div class="contenedor">
        <div class="cultura-div">

            @foreach ($publicaciones as $publicacion)
            <div class="cultura-contenido">
                <h1>{{$publicacion->titulo}}</h1>
                <!-- @if ($publicacion->imagen) -->

                <img src="{{ asset('storage/'.$publicacion->imagen) }}" alt="" style="width: 100px; height: auto;">
                <!-- @endif -->
                <!-- <img src="{{asset('img/botana_1.jpeg')}}" alt="img"> -->

                <div class="cultura-fecha">
                    <p>Fecha: {{$publicacion->fecha}}</p>
                    <p>Hora: {{$publicacion->hora}}</p>
                </div>
                <p>{{$publicacion->contenido}}</p>
              

            </div>

            @endforeach
        </div>
    </div>



</x-app-layout>