<x-app-layout>
<!-- 
<form method="post" action="{{ route('auth.logout')}}" >
    @csrf
    <button type="submit">Cerrar Sesion</button>
</form> -->


<!-- @if(auth()->check())
    <p>Estás logueado como: {{ auth()->user()->name }}</p>
@else
    <p>No hay sesión activa</p>
@endif -->

    <h1>Bienvenido {{ auth()->user()->name }}</h1>


    <div class="contenedor">
        <div class="admin-categorias">
            <a class="cat-inf" href="{{ route('comidas.index') }}">
                <img src="{{asset('img/dish-fork.png')}}" alt="img">
                <p>COMIDAS</p>
            </a>

            <a class="cat-inf" href="{{ route('bebidas.index') }}">
                <img src="{{asset('img/drink.png')}}" alt="img">
                <p>BEBIDAS</p>
            </a>


            <a class="cat-inf"  href="{{ route('shots.index') }}">
                <img src="{{asset('img/shot.png')}}" alt="img">
                <p>SHOTS</p>
            </a>

            <a class="cat-inf"  href="{{ route('temporada.index') }}">
                <img src="{{asset('img/fish-dish.png')}}" alt="img">
                <p>DE TEMPORADA</p>
            </a>




        </div>
    </div>


    <div class="pages-back">


        <a class="pages" href="{{ route('back.reservas') }}">RESERVAS</a>

        <a class="pages" href="{{ route('publicacion.index') }}">CULTURA</a>

    </div>
</x-app-layout>