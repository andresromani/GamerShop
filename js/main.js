var categoria = document.getElementsByClassName('category');

for (var i = 0; i < categoria.length - 1; i++) {
    categoria[i].addEventListener('click', (e) => {
        var categoriaElegida = e.target;
        var padre = categoriaElegida.parentElement;
        var subcategoria = padre.childNodes[3];
        subcategoria.classList.toggle('show');
    });
}