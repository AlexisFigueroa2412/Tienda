/*
*   Este controlador es de uso general en las páginas web del sitio público. Se importa en la plantilla del pie del documento.
*   Sirve para inicializar los componentes del framework que son comunes en las páginas web.
*/

// Método que se ejecuta cuando el documento está listo.
document.addEventListener('DOMContentLoaded', function () {
    // Se declara e inicializa un arreglo con los nombres de las imagenes que se pueden utilizar en el efecto parallax.
    let images = ['img01.jpg', 'img02.jpg', 'img03.jpg', 'img04.jpg', 'img05.jpg'];
    // Se declara e inicializa una variable para obtener un elemento del arreglo de forma aleatoria.
    let element = Math.floor(Math.random() * images.length);
    // Se asigna la imagen a la etiqueta img por medio del atributo src.
    document.getElementById('parallax').setAttribute('src', '../../resources/img/parallax/' + images[element]);
    // Se inicializa el efecto Parallax.
    M.Parallax.init(document.querySelectorAll('.parallax'));
    // Se inicializa el componente Sidenav para que funcione el menú lateral.
    M.Sidenav.init(document.querySelectorAll('.sidenav'));
    // Se inicializa el componente Modal para que funcionen las cajas de dialogo.
    M.Modal.init(document.querySelectorAll('.modal'));
    // Se inicializa el componente Tooltip asignado a botones y enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
});