<x-app-layout>
    <h1>Crear Nuevo Producto</h1>

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

        <form class="formulario-back " action="{{ route('shots.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="campo-back">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre')}}">
            </div>
            <div class="campo-back">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" placeholder="Precio" value="{{ old('precio')}}">
            </div>
            <div class="campo-back">
                <label for="descripcion">Descrip.</label>
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{ old('descripcion')}}">
            </div>


            <div class="campo-back">
                <label for="id_sub_categoria">Sub-Categoria</label>
                <select name="id_sub_categoria" id="">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach($SubCategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}" {{ old('id_sub_categoria') == $subcategoria->id ? 'selected' : '' }}>
                        {{ $subcategoria->nombre }}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="campo-back">
                <label for="imagen">Imagen.</label>
                <input type="file" name="imagen" id="imagen" placeholder="Imagen" value="{{ old('imagen')}}">
            </div>



            <input type="submit" value="Enviar" class="boton-back">

        </form>
    </div>
</x-app-layout>