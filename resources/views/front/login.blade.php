<x-app-layout>


    <div class="login-contenedor">
        <div class="div-login">
            <h1>Iniciar Sesión</h1>
            <p>Inicio de sesión requerida para administradores</p>
            <img src="{{asset('img/logo_1.svg')}}" alt="Logo-Capitan">

        </div>


        <form class="formulario-front" action="{{ route('reserva.store')}}" method="POST">
            @csrf
            <div class="campo-front">
                <label for="nombres">Usuario</label>
                <input type="text" name="nombres" id="nombres" placeholder="Tu Usuario" value="{{ old('nombres')}}">
            </div>

            <div class="campo-front">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" placeholder="Tu password" value="{{ old('password')}}">
            </div>


            <div>
                <input type="submit" value="Enviar" class="boton-front">
            </div>


        </form>
    </div>


</x-app-layout>