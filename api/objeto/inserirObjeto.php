<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/ObjetoDao.php";

function logicaInserirObjeto(){
   $objetoDao = new ObjetoDao();
   $objeto['id_ambiente'] = $_GET['id_ambiente'];
   $objeto['nome'] = $_GET['nome'];
   $objeto['descricao'] = $_GET['descricao'];
   $resultado = $objetoDao->inserirObjeto($objeto);
   echo $resultado;
}

logicaInserirObjeto();