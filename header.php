<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamerShop</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div>
            <div class="logo">
                <a href="./?page=inicio" style="font-size: 3em">GS</a>
            </div>

            <div class="search">
                <form action="./productos.php" method="GET">
                    <input type="search" name="buscar" class="search-bar">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>

            <!-- <div class="redes">
                <a href="#"><img src="img/facebook.png" height="40px" alt=""></a>
                <a href="#"><img src="img/instagram.png" height="40px" alt=""></a>
                <a href="#"><img src="img/twitter.png" height="40px" alt=""></a>
                <a href="#"><img src="img/wpp.png" height="40px" alt=""></a>
            </div> -->

            <div class="botones">
                <a href="./?page=login"><i class="fas fa-user" style="font-size: 1.7em;"></i></a>
                <a href="#" style="font-size: 1.9em; color: red;
                "><i class="fas fa-heart"></i></a>
                <a href="#" style="font-size: 1.7em;"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </header>

    <div class="contenedor-menu">
        <div class="menu-btn">
            <a href="#" id="btn-show-menu"><i class="fas fa-bars"></i></a>
        </div>

        <nav class="menu hide">
            <a href="#">PC Armada</a>
            <a href="#">Armá tu PC</a>
            <a href="./?page=productos">Productos</a>
            <a href="#">Notebooks</a>
            <a href="#">Monitores</a>
            <a href="./?page=formulario">Contacto</a>
        </nav>
    </div>