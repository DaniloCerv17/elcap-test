<x-app-layout>


    <h1 class="h1-principal">Reservar</h1>

    <div class="contenedor">
        <div class="form">
            <div class="info-reservar">
                <h3>¡Ven y celebra Con Nosotros!</h3>
                <p>Cumpleaños, reuniones, cenas especiales y más.</p>
                <p> Reserva tu lugar y haz de tu evento algo inolvidable.</p>
                <img src="{{asset('img/nosotros_1.jpg')}}" alt="ss">
            </div>

            <div>
                <h4>Llena los siguientes campos</h4>
                <form class="formulario" action="{{ route('reserva.store')}}" method="POST">
                    @csrf
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre">
                    </div>

                    <div class="campo">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Tu Apellido">
                    </div>


                    <div class="campo">
                        <label for="telefono">Telefono</label>
                        <input type="tel" name="telefono" id="telefono" placeholder="Tu Telefono">
                    </div>


                    <div class="campo">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Tu E-mail">
                    </div>

                    <div class="campo">
                        <label for="numPersonas">Num de Personas</label>
                        <input type="number" name="numPersonas" id="numPersonas" placeholder="Numero de Personas">
                    </div>
                    <div class="campo">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" id="fecha" placeholder="Fecha de Reserva">
                    </div>
                     <div class="campo">
                        <label for="Hora">Hora</label>
                        <input type="time" name="hora" id="Hora" placeholder="Hora de Reserva">
                    </div>
                    <input type="submit" value="Enviar" class="boton">

                </form>
            </div>
        </div>
    </div>
</x-app-layout>