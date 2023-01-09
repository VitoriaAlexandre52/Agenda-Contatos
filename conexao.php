<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "agenda_contatos";

    $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);
    
    //if(!$conexao){
    //    die("Houve um Erro:" .mysqli_connect_errno());
    ////}
    //else{
    // echo "Deu Certooo, genteeeeee";
    //}
?>