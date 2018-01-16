<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/dao/SensorDao.php";

function logicaInserirSensor(){
   $sensorDao = new SensorDao();
   $sensor['id_no'] = $_GET['id_no'];
   $sensor['id_ambiente'] = $_GET['id_ambiente'];
   $sensor['id_usuario'] = $_GET['id_usuario'];
   $sensor['id_tipo_sensor'] = $_GET['id_tipo_sensor'];
   $sensor['ip'] = $_GET['ip'];
   $sensor['mac'] = $_GET['mac'];
   $sensor['nome'] = $_GET['nome'];
   $sensor['descricao'] = $_GET['descricao'];
   $resultado = $sensorDao->inserirSensor($sensor);
   echo $resultado;
}

logicaInserirSensor();