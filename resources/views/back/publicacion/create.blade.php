<x-app-layout>

<h1>Crear Publicación</h1>

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

        <form class="formulario-back " action="{{ route('publicacion.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="campo-back">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="titulo" value="{{ old('titulo')}}">
            </div>
            <div class="campo-back">
                <label for="contenido">Contenido</label>
                <input type="text" name="contenido" id="contenido" placeholder="Contenido" value="{{ old('contenido')}}">
            </div>
           
            <div class="campo-back">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" placeholder="Imagen">
            </div>

             <div class="campo-back">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" placeholder="fecha" value="{{ old('fecha')}}">
            </div>

            
             <div class="campo-back">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" placeholder="hora" value="{{ old('hora')}}">
            </div>



            <input type="submit" value="Enviar" class="boton-back">

        </form>
    </div>


</x-app-layout>
