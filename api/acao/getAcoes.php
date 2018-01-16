<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/AcaoDao.php';

function getAcoes(){
   $acaoDao = new AcaoDao();
   $resultado = $acaoDao->getAcoes();
   echo json_encode($resultado);
}

getAcoes();