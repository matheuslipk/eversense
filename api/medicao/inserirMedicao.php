<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/MedicaoDao.php";

function logicaInserirMedicao(){
   $medicaoDao = new MedicaoDao();
   $medicao['id_sensor'] = $_GET['id_sensor'];
   $medicao['valor'] = $_GET['valor'];
   $resultado = $medicaoDao->inserirMedicao($medicao);
   echo $resultado;
}

logicaInserirMedicao();