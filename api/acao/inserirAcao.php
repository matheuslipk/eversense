<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/AcaoDao.php";

function logicaInserirAcao(){
   $acaoDao = new AcaoDao();
   $acao['nome'] = $_GET['nome'];
   $acao['descricao'] = $_GET['descricao'];
   $resultado = $acaoDao->inserirAcao($acao);
   echo $resultado;
}

logicaInserirAcao();