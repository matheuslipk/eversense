<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/AcaoObjetoDao.php';

function getAcoesByObjeto(){
   $acaoObjetoDao = new AcaoObjetoDao();
   $acao['id_objeto'] = $_GET['id_objeto'];
   $resultado = $acaoObjetoDao->getAcoesByObjeto($acao);
   echo json_encode($resultado);
}

getAcoesByObjeto();