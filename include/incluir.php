<?php
    $ruta = $_SERVER['DOCUMENT_ROOT']."/proyecto/";
    require_once($ruta."configuracion/SQL.php");
    require_once($ruta."configuracion/HTML.php");
    require_once($ruta."css/CSS.php");
    
    if (!empty($_GET['ruta']))
    {
        if (!empty($_GET['campos']))
        {
            if (!empty($_GET['tabla']))
            {
                include($ruta.$_GET['ruta']."?campos=".$_GET['campos']."&tabla=".$_GET['tabla']);        
            }
            else
            {
                include($ruta.$_GET['ruta']."?campos=".$_GET['campos']);    
            }
        }
        else  
        {
            include($ruta.$_GET['ruta']);    
        }
    }   
?>