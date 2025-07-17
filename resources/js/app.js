import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {

    crearGaleria();

})


function crearGaleria() {

    const galeria = document.querySelector('.galeria-imagenes');
    const cantIMG = 6;

    for (let i = 1; i < cantIMG; i++) {
        const imagen = document.createElement('IMG')
        imagen.src = `img-galeria/${i}.jpeg`
        imagen.alt = `Imagen ${i}`

        galeria.appendChild(imagen)

        //event handler
        imagen.onclick = function () {

            mostrarImagen(i);


        }
    }

}

function mostrarImagen(i) {

    const imagen = document.createElement('IMG')
    imagen.src = `img-galeria/${i}.jpeg`
    imagen.alt = `Imagen ${i}`



    //Generar modal
    const modal = document.createElement('DIV')
    modal.classList.add('modal')
    modal.onclick = cerrarModal

    //boton cerrarmodal
    const cerrarModalBtn = document.createElement('BUTTON')
    cerrarModalBtn.textContent = 'X'
    cerrarModalBtn.classList.add('btn-cerrar')
    cerrarModalBtn.onclick = cerrarModal



    modal.appendChild(imagen)
    modal.appendChild(cerrarModalBtn)




    //Agregar al HTML
    const body = document.querySelector('body')
    body.classList.add('overflow-hidden')
    body.appendChild(modal)

}

function cerrarModal() {
    const modal = document.querySelector('.modal')
    modal.classList.add('fade-out')

    setTimeout(() => {
        modal?.remove()
        const body = document.querySelector('body')
        body.classList.remove('overflow-hidden')
    }, 500);


}
function toggleMenu(elemento) {
    const submenu = elemento.nextElementSibling;

    if (!submenu) return;

    const estilo = window.getComputedStyle(submenu);

    if (estilo.display === 'none') {
        submenu.style.display = 'block';
    } else {
        submenu.style.display = 'none';
    }
}

window.toggleMenu = toggleMenu;

window.toggleMenu = toggleMenu;


// function toggleComida() {
//     const elementos = document.getElementsByClassName('sub-menu');

//     for (let i = 0; i < elementos.length; i++) {
//         const estilo = window.getComputedStyle(elementos[i]);
//         if (estilo.display === 'none') {
//             elementos[i].style.display = 'block';
//         } else {
//             elementos[i].style.display = 'none';
//         }
//     }
// }

// function toggleBebida() {
//     const elementos = document.getElementsByClassName('sub-menu2');

//     for (let i = 0; i < elementos.length; i++) {
//         const estilo = window.getComputedStyle(elementos[i]);
//         if (estilo.display === 'none') {
//             elementos[i].style.display = 'block';
//         } else {
//             elementos[i].style.display = 'none';
//         }
//     }
// }


// window.toggleComida = toggleComida;
// window.toggleBebida = toggleBebida;
