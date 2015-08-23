<?php
include("incluir.php");

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'mnsId';
$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$query = isset($_POST['query']) ? $_POST['query'] : "mnsId, mnsPadre/bif_menus/1=1";
$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;

$arreglo = explode("/", $query);

$primerCampo = explode(",", $arreglo[0]);

$sort = "$sortname $sortorder";

$limit = (($page-1) * $rp).", $rp";

$rows = SQL::filasEnArreglo1(SQL::seleccionar($arreglo[0], $arreglo[1], $arreglo[2], "", $sort, $limit));

$total = SQL::filasEnArreglo(SQL::seleccionar("COUNT(".$primerCampo[0].")", $arreglo[1], $arreglo[2]));

header("Content-type: application/json");
$jsonData = array('page'=>$page,'total'=>$total[0][0],'rows'=>array());
foreach($rows AS $clave => $valor){
	$entry = array(
			key($valor) => $valor[key($valor)],
			'cell'=> $rows[$clave],
	);
	$jsonData['rows'][] = $entry;
}
echo json_encode($jsonData);