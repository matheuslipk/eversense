<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/SensorDao.php';

function getSensorByAmbiente(){
   $ambienteDao = new SensorDao();
   $ambiente['id_ambiente'] = $_GET['id_ambiente'];
   $resultado = $ambienteDao->getSensorByAmbiente($ambiente);
   echo json_encode($resultado);
}

getSensorByAmbiente();