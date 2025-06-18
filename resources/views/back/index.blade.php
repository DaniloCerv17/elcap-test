<x-app-layout>
    <h1>Bienvenido Administrador</h1>


    <div class="contenedor">
        <div class="admin-categorias">
            <a class="cat-inf" href="">
                <img src="{{asset('img/dish-fork.png')}}" alt="img">
                <p>COMIDAS</p>
            </a>

            <a class="cat-inf" href="">
                <img src="{{asset('img/drink.png')}}" alt="img">
                <p>BEBIDAS</p>
            </a>


            <a class="cat-inf" href="">
                <img src="{{asset('img/shot.png')}}" alt="img">
                <p>SHOTS</p>
            </a>

            <a class="cat-inf" href="">
                <img src="{{asset('img/fish-dish.png')}}" alt="img">
                <p>DE TEMPORADA</p>
            </a>




        </div>
    </div>


    <div class="pages-back">


        <a class="pages" href="{{ route('back.reservas') }}">RESERVAS</a>

        <a class="pages" href="{{ route('back.cultura') }}">CULTURA</a>

    </div>
</x-app-layout>