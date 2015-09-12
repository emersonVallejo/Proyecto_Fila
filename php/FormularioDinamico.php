<?php
 	
    $camposFormulario="'mnpId','mnsDescripcion','prfNombre'";
     
 	$tablasFormulario ="bif_menusperfiles INNER JOIN bif_menus ON mnp_mnsId = mnsId INNER JOIN bif_perfiles ON mnp_prfId = prfId";
   
    $condicionFormulario = "mnpId = 0001";

     $condicionCampos = array(
        "mnsDescripcion"    =>  array("mnp_mnsId", "mnsId < 10"),
        "prfNombre"         =>  array("mnp_prfId", "prfId IN (1, 2)")
    );


    echo HTML::FormularioDinamico($camposFormulario,$tablasFormulario,$condicionFormulario,$condicionCampos);



    /*$camposFormulario="'mnsId','mnsDescripcion','mnsPadre','mnsRuta',mnsEstado";
     
 	$tablasFormulario ="bif_menus";
   
    $condicionFormulario = "mnsId = 0001";

     $condicionCampos = array(
        "mnsPadre"    =>  array("mnsPadre", "mnsId < 10"),
        "mnsEstado"   =>  array("", "SELECT  '0' as mnsIdEstado,  'Inactivo' AS mnsEstado UNION ALL SELECT  '1' as mnsIdEstado,  'Activo' AS mnsEstado UNION ALL SELECT  '2' as mnsIdEstado,  'Otro' AS mnsEstado")
    );


    echo HTML::FormularioDinamico($camposFormulario,$tablasFormulario,$condicionFormulario,$condicionCampos);*/


?>