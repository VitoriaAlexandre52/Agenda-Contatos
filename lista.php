<?php
    include("conexao.php");
    if(!empty($_GET['search']))
    {
      $data = $_GET['search'];
      $lista = "SELECT * FROM informacoes WHERE nome LIKE '%$data%' ORDER BY id_contato DESC";
    }
    else
    {
      $lista = "SELECT * FROM informacoes ORDER BY id_contato DESC";
    }
      $result = $conexao->query($lista);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem | Agenda de Contatos</title>
<style>
    table, th, td{
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td{
      padding: 5px 10px;
    }
    th{
      background-color: #4B0082;
      color: white;
    }
    .table{
      width: 100%;
    }
    * {
      font-family: Arial, Helvetica, sans-serif;
    }
    table tr:nth-child(odd) {
      background-color: white;
    }
    table tr:nth-child(even) {
      background-color: #D8BFD8;
    }
    td{
      text-align: center;
    }
    div{
    margin: 30px;
    }
    a{
    color: red;
    }
    .pesquisa{
      width: 30%;
    }
    .botao{
      background-color: blue;
      color: white;
      border: 2px solid blue;
    }
    .botao:hover{
      background-color: #6495ED	;
      color: white;
      border: 2px solid #6495ED;
    }
    .box-search{
      display: flex;
      justify-content: center;
      gap: .1%;
    }

    .voltar{
    text-decoration: none;
    height: 30px;
    width: 50%;
    background-color: #4B0082;
    color: white;
    font-weight: bold;
    padding: 10px;
    margin: 28px;
    border-radius: 15px;
    padding-left: 75px;
    padding-right: 75px ;
    padding-top: 10px;
    height: 38px;
    }
    .voltar:hover{
      cursor: pointer;
      background-color: #a462d3;
      border: 2px solid #a462d3;
    }
</style> 
</head>
<body> 

  <div class="box-search">
    <input type="search" class="pesquisa" placeholder="Buscar Contato" id="pesquisar">
    <button onclick="searchData()" class="botao">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
    </button>
  </div>
<div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Sobrenome</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Idade</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>
          <th scope="col">...</th>
        </tr>
      </thead>
      <tbody>
        <?php
           while($user_data = mysqli_fetch_assoc($result))
           {
            echo "<tr>";
            echo "<td>" .$user_data['id_contato']."</td>";
            echo "<td>" .$user_data['nome']."</td>";
            echo "<td>" .$user_data['sobrenome']."</td>";
            echo "<td>" .$user_data['data_nasc']."</td>";
            echo "<td>" .$user_data['idade']."</td>";
            echo "<td>" .$user_data['telefone']."</td>";
            echo "<td>" .$user_data['email']."</td>"; 
            echo "<td> 
            <a class='btn btn-danger' href='delete.php?id_contato=$user_data[id_contato]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
</svg>
            </a>
            </td>";
            echo "</tr>"; 
           }
        ?>
      </tbody>
    </table>
  </div>
  <a class="voltar" href="formulario.html">Novo Cadastro</a>
  <a class="voltar" href="home.html">Voltar ao Inicio</a>
</body>
<script>
  var search = document.getElementById('pesquisar');

  search.addEventListener("keydown", function(event){
    if(event.key === "Enter")
    {
      searchData();
    }
  });
  function searchData()
  {
    window.location = 'lista.php?search='+search.value;
  }
</script>
</html>