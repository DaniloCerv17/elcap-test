<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Capitán</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet"> 
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"> 
     -->
    @vite('resources/scss/app.scss')
</head>

<body>
    <header class="header">

     

            <div class="img-fondo">
                <div class="img-center">
                    <img src="{{asset('img/logo_1.svg')}}" alt="Logo-Capitan">
                </div>

                <div class="texto-img">

                    <h1> Restaurante <span> El Capitán </span> Chichimila</h1>
                </div>
            </div>
      



        <nav class="navegacion">
            <a href="{{ route('back.index') }}"><i class="bi bi-box-arrow-in-right"></i> LogIn</a>
            <a href="{{ route('front.home') }}">Inicio</a>
            <a href="##"><i class="bi bi-geo-alt"></i>Ubicación</a>
        </nav>




    </header>

    <!--=============================CONTENIDO DINAMICO ===================================-->


    {{$slot}}

    <!--==================================================================================-->


    <footer class="footer">
        <div class="footer-contenedor">

            <div class="siguenos-flex">
                <h4>Siguenos:</h4>
                <a href="##"><i class="bi bi-facebook"></i>Facebook</a>
                <a href="##"><i class="bi bi-instagram"></i>Instagram</a>

            </div>

            <div class="contactanos-flex">
                <h4>Contactanos:</h4>
                <a href="##"><i class="bi bi-envelope-at"></i>Elcapitan@gmail.com</a>
                <a href="##"><i class="bi bi-whatsapp"></i>999 640 4016</a>

            </div>

            <div>
                <img src="{{asset('img/logo_1.svg')}}" alt="Logo-Capitan">
            </div>

        </div>

    </footer>

</body>

</html>