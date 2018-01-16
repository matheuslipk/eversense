<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class AcaoDao {
  
   private $tabela = "acao";
    
   public function inserirAcao($acao){            
      $query = "INSERT INTO $this->tabela VALUES (NULL,?,?)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("ss", $acao['nome'], $acao['descricao']);
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
   
   public function getAcoes(){
      $query = "SELECT * FROM $this->tabela";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
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
