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
                <p>{{$publicacion->contenido}}</p>
            </div>

            @endforeach
        </div>
    </div>

    <!-- <div class="cultura-contenido">
                <h1>TITULO 2</h1>
                <img src="{{asset('img/botana_1.jpeg')}}" alt="img">
                <p>Unos enfermos de lepra de ese albergue encontraron unas flores amarillas en la plaza de sisal y a rastras llegaron hasta la parroquia de San Servasio, en el centro del poblado, con el fin de ofrendarlas, así fue que sus familiares contaron que un haz de luz procedente del altar, donde se encuentra el santísimo sacramento baño a los enfermos y antes de que concluya octubre obtuvieron la sanación de ese mal que les causa mucho dolor.

                    Así como la voz corrió por toda la población y llego a otras vecinas, por lo que empezaron a llegar distintos peregrinos en animales de carga que tenían que pernoctar, porque en aquella época no había vehículos para retornar a sus comunidades por las noches, por lo que empezaron a celebrarse las noches de octubre que alegraban con antorchas y luces de aceite en las candilejas. Con eso se iluminada alrededor del templo y la plaza donde solo había un kiosco central, que servía a músicos de tribuna, así como para actos políticos. Los agricultores desde tiempo atrás llevaban mazorcas, cabezas de venado, y otras ofrendas como ramilletes, atole nuevo y otras cosechas, todo en el sentido estricto para reforzar la fe al santísimo sacramento del altar.</p>
            </div>

            <div class="cultura-contenido">
                <h1>TITULO 2</h1>
                <img src="{{asset('img/botana_1.jpeg')}}" alt="img">
                <p>El primer gremio que fue el de zapateros, posteriormente se le sumaron los talabarteros y los curtidores quienes conformaban una sola agrupación. En la imagen se puede observar al Sr. Mónico Puc Che, quien es el propietario del Restaurante El Capitán, y a su lado se encuentra la Sra. María Verónica Puc Tuz, quien es la encargada del restaurante. El Restaurante El Capitán se enorgullece en participar en el gremio restaurantero siendo el primer año de participación. Es un gran honor formar parte de las tradiciones y actividades que nos identifican culturalmente. Esto se logra gracias al trabajo en equipo de nuestros empleados y la dedicación de nuestra encargada, quienes día a día se esfuerzan por brindar un servicio excelente. Nos esforzamos constantemente por mejorar como establecimiento y siempre tenemos en cuenta nuestra identidad yucateca y nuestras tradiciones. Es por eso que nos complace unirnos a las "Noches de Octubre", un evento en el que participa el gremio restaurantero. Es un verdadero honor poder formar parte de estas actividades y contribuir al enriquecimiento de nuestra cultura. Esperamos seguir brindando un servicio excepcional y representar con orgullo nuestras tradiciones yucatecas en el Restaurante El Capitán.</p>
            </div> -->




    <!-- <div class="cultura-contenido">
               <h1>IMAGEN</h1>
                <p>jsxjxjjsnxjsnxjnsxjnsjxnsxsxsxsx</p>
            </div> -->


    <!-- <div class=" table-reservas">
        <table class="contenedor">
            <thead>
                <tr>
                   <th>ID</th>
                   <th>Titulo</th>
                   <th>Contenido</th>
                  
                   
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $publicacion)
                <tr>
                   <td>{{$publicacion->id}}</td>
                     <td>{{$publicacion->titulo}}</td>
                     <td>{{$publicacion->contenido}}</td>
                     
                   
                </tr>
             
                @endforeach
            </tbody>

        </table>
    </div> -->

</x-app-layout>