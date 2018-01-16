<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class SensorDao {
  
   private $tabela = "sensor";
    
   public function inserirSensor($sensor){            
      $query = "INSERT INTO $this->tabela VALUES (NULL,?,?,?,?,?,?)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiissss", $sensor['id_no'], $sensor['id_ambiente'], $sensor['id_usuario'], 
            $sensor['id_tipo_sensor'], $sensor['ip'], $sensor['mac'], $sensor['nome'], $sensor['descricao']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return true;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
   
   public function getSensorByAmbiente($ambiente){
      $query = "SELECT * FROM sensor WHERE id_ambiente=?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->prepare($query);
      $stmt->bind_param('i', $ambiente['id_ambiente']);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
                     
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();        
      $con->close();
      return NULL;    
   }
      
}
