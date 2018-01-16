<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/dao/ConexaoBD.php';

class AcaoObjetoDao {
  
   private $tabela = "acao_objeto";
    
   public function inserirAcaoObjeto($acaoObjeto){            
      $query = "INSERT INTO $this->tabela VALUES (?,?)";
      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("ii", $acaoObjeto['id_acao'], $acaoObjeto['id_objeto']);
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
   
   public function getAcoesByObjeto($acao){
      $query = "SELECT * FROM view_acao_objeto WHERE id_objeto=?";

      $con = ConexaoBD::getConexao();
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $acao['id_objeto']);
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
