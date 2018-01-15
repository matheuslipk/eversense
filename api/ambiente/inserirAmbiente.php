<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/AmbienteDao.php";

function logicaInserirAmbiente(){
   $ambienteDao = new AmbienteDao();
   $ambiente['id_usuario'] = $_GET['id_usuario'];
   $ambiente['nome'] = $_GET['nome'];
   $ambiente['descricao'] = $_GET['descricao'];
   $resultado = $ambienteDao->inserirAmbiente($ambiente);
   echo $resultado;
}

logicaInserirAmbiente();