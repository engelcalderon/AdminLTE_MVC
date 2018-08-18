<?php

if (isset($_COOKIE["factura"])) {
    require "controllers/pdfController.php";
}
else {
    echo "no hay factura por mostrar";
}

?>