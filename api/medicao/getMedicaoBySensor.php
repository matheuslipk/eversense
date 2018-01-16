<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/MedicaoDao.php';

function getMedicaoBySensor(){
   $medicaoDao = new MedicaoDao();
   $medicao['id_sensor'] = $_GET['id_sensor'];
   $medicao['data_inicio'] = $_GET['data_inicio'];
   $medicao['data_fim'] = $_GET['data_fim'];
   $resultado = $medicaoDao->getMedicaoBySensor($medicao);
   echo json_encode($resultado);
}

getMedicaoBySensor();