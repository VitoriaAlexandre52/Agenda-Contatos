<?php
  include("conexao.php");
 
  $nome = $_POST['nome'];
  $sobrenome= $_POST['sobrenome'];
  $data = $_POST['data'];
  $idade = $_POST['idade'];
  $telefone= $_POST['telefone'];
  $email = $_POST['email'];

  $sql = "INSERT INTO informacoes(nome, sobrenome, data_nasc, idade, telefone, email) VALUES ('$nome','$sobrenome','$data','$idade','$telefone','$email')";
  if(!mysqli_query($conexao, $sql)) {
    echo "Contato nao Cadastrado";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensagem | Agenda de Contatos</title>
  <style>
    a{
    text-decoration: none; 
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 2px solid #4B0082;
    padding: 20px 30px;
    border-radius: 15px;
    background-color:  #4B0082;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 50px;
      }

    a:hover{
      background-color: #a462d3;
    border: 2px solid #a462d3;
    cursor: pointer;
    }  

  </style>
</head>
<body>

  <a href="lista.php">Listagem de Contatos ></a>
</body>
</html>
