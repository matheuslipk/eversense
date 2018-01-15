<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/NoDao.php";

function logicaInserirNo(){
   $noDao = new NoDao();
   $no['id_usuario'] = $_GET['id_usuario'];
   $no['ip'] = $_GET['ip'];
   $no['nome'] = $_GET['nome'];
   $no['descricao'] = $_GET['descricao'];
   $no['id_ambiente'] = $_GET['id_ambiente'];
   $resultado = $noDao->inserirNo($no);
   echo $resultado;
}

logicaInserirNo();