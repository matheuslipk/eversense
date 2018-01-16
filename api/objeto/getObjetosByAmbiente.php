<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ObjetoDao.php';

function getObjetoByAmbiente(){
   $objetoDao = new ObjetoDao();
   $objeto['id_ambiente'] = $_GET['id_ambiente'];
   $resultado = $objetoDao->getObjetosByAmbiente($objeto);
   echo json_encode($resultado);
}

getObjetoByAmbiente();