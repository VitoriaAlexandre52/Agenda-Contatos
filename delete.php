<?php
  if(!empty($_GET['id_contato']))
  {
    include_once('conexao.php');
    $id = $_GET['id_contato'];
    $sqlSelect = "SELECT * FROM informacoes WHERE id_contato=$id";
    $result = $conexao->query($sqlSelect);

    if($result->num_rows >0)
    {
        $sqlDelete = "DELETE FROM informacoes WHERE id_contato = $id";
        $resultDelete = $conexao->query($sqlDelete);
    }
  }
 header('Location: lista.php'); 
?>