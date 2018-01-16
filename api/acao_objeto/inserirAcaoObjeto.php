<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/AcaoObjetoDao.php";

function logicaInserirAcaoObjeto(){
   $acaoObjetoDao = new AcaoObjetoDao();
   $acaoObjeto['id_acao'] = $_GET['id_acao'];
   $acaoObjeto['id_objeto'] = $_GET['id_objeto'];
   $resultado = $acaoObjetoDao->inserirAcaoObjeto($acaoObjeto);
   echo $resultado;
}

logicaInserirAcaoObjeto();