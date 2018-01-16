<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class MedicaoDao {
  
   private $tabela = "medicao";
    
   public function inserirMedicao($mecicao){            
      $query = "INSERT INTO $this->tabela VALUES (NULL,?,?,NULL)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("id", $mecicao['id_sensor'], $mecicao['valor']);
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
   
   public function getMedicaoBySensor($sensor){
      $query = "SELECT * FROM view_medicao WHERE id_sensor=? AND data BETWEEN ? AND ?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->prepare($query);
      $stmt->bind_param('i', $sensor['id_sensor'], $sensor['data_inicio'], 
              $sensor['data_fim']);
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
   
   public function getMedicaoByAmbiente($ambiente){
      $query = "SELECT * FROM view_medicao WHERE id_ambiente=? AND data BETWEEN ? AND ?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->prepare($query);
      $stmt->bind_param('iss', $ambiente['id_ambiente'], $ambiente['data_inicio'], 
              $ambiente['data_fim']);
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
