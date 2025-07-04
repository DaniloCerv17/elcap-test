<x-app-layout>

    <h1>Editar Publicación</h1>

    <div class="contenedor">
        @if ($errors->any())

        <div class="error-back">
            @foreach ($errors->all() as $error)
            <div>
                <p>{{ $error }}</p>
            </div>

            @endforeach

        </div>
        @endif


        <form class="formulario-back " action="{{ route('publicacion.update', $publicacion->slug)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="campo-back">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="titulo" value="{{ old('titulo', $publicacion->titulo)}}">
            </div>
            <div class="campo-back">
                <label for="contenido">Contenido</label>
                <input type="text" name="contenido" id="contenido" placeholder="Contenido" value="{{ old('contenido',$publicacion->contenido)}}">
            </div>

            <div class="campo-back">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" placeholder="fecha" value="{{ old('fecha',$publicacion->fecha)}}">
            </div>


            <div class="campo-back">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" placeholder="hora" value="{{ old('hora',$publicacion->hora)}}">
            </div>


            <div class="campo-back">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" placeholder="Imagen">
            </div>

            <div class="img-edit">
                <img src="{{ asset('storage/'.$publicacion->imagen) }}" alt="">
            </div>

            <input type="submit" value="Actualizar" class="boton-back">

        </form>
    </div>


</x-app-layout>