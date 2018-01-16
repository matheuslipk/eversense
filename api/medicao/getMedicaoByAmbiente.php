<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/MedicaoDao.php';

function getMedicaoByAmbiente(){
   $medicaoDao = new MedicaoDao();
   $medicao['id_ambiente'] = $_GET['id_ambiente'];
   $medicao['data_inicio'] = $_GET['data_inicio'];
   $medicao['data_fim'] = $_GET['data_fim'];
   $resultado = $medicaoDao->getMedicaoByAmbiente($medicao);
   echo json_encode($resultado);
}

getMedicaoByAmbiente();