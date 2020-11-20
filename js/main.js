// Menú de categorias y sub_categorias
var categoria = document.getElementsByClassName('category');

if (categoria) {
    for (var i = 0; i < categoria.length - 1; i++) {
        categoria[i].addEventListener('click', (e) => {
            var categoriaElegida = e.target;
            var padre = categoriaElegida.parentElement;
            var subcategoria = padre.childNodes[3];
            subcategoria.classList.toggle('show');
        });
    }
}

// Menú dinamico de categorías y sub_categorias para formulario de insertar/editar productos
let categoria1 = document.querySelector('#categoria');

if (categoria1) {
    categoria1.addEventListener('change', () => {
        let categoria_id = categoria1.value;
        objAjax = new XMLHttpRequest();

        objAjax.addEventListener('load', cargarSubcategorias);
        objAjax.addEventListener('error', errorAjax);

        objAjax.open('POST', 'validar.php');
        objAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        objAjax.send("categoria_id=" + categoria_id);
    });

    const cargarSubcategorias = () => {
        if (objAjax.status === 200) {
            let sub_categorias_json = objAjax.responseText;
            let sub_categorias = JSON.parse(sub_categorias_json);
            let sub_categoria = document.querySelector('#subcategoria');
            sub_categoria.innerHTML = "";

            for (let i = 0; i < sub_categorias.length; i++) {
                sub_categoria.innerHTML += "<option value=" + sub_categorias[i][0] + ">" + sub_categorias[i][1] + "</option>";
            }
        }
    }

    const errorAjax = () => {
        console.log("Ha habido un error");
    }
}