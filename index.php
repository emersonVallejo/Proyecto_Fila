<?php
include("include/incluir.php");

//$titulo = SQL::filasEnArreglo(SQL::seleccionar("trcPriNombre","bif_terceros"));
$menu = SQL::filasEnArreglo(SQL::seleccionar("mnsId, mnsDescripcion, mnsRuta","bif_menus", "mnsPadre = 0"));
$css = CSS::estiloHTML();
$js = "";

echo HTML::esquemaHTML(
    HTML::head($css, $js, "Fila").
    HTML::body(
        HTML::header(HTML::figure("imagenes/logo.jpg").HTML::nav(HTML::menuPrincipal($menu, 'navbar-nav'))).
        HTML::section(HTML::article("").HTML::aside("")).
        HTML::footer("").
        HTML::popUp("").
        HTML::alert("").
        HTML::menuBotones()
    )
);
?>
