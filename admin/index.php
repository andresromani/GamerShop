<?php
include "../functions.php";
include "header.php";
?>

<section class="page">

<?php
if (isset($_GET['page'])) {
    $vista = $_GET['page'] . ".php";
}
else {
    $vista = "panel.php";
}

include cargarPagina($vista);
?>

</section>

<?php
include "footer.php";
?>