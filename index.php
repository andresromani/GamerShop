<?php
include "functions.php";
include "header.php";
?>
    
<div class="page">
<?php
if (isset($_GET['page'])) {
    $vista = $_GET['page'] . ".php";
}
else {
    $vista = "inicio.php";
}

include cargarPagina($vista);
?>
</div>

<?php
include "footer.php";
?>