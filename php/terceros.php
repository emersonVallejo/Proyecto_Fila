<?php
/*$registros = SQL::filasEnArreglo(SQL::seleccionar("trcPriNombre, trcSegNombre, trcPriApellido, trcSegApellido, trcCedula", "bif_terceros"));

$encabezado = array(
    "Primer Nombre",
    "Segundo Nombre",
    "Primer Apellido",
    "Segundo Apellido",
    "Cedula"
);

echo HTML::tabla($encabezado, $registros);*/

echo "string";

$i = 1;
while ($i <= 20000) {
    echo $i;
    $i++;
}

?>